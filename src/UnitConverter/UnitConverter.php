<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter;

use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Exception\MissingUnitRegistryException;
use UnitConverter\Exception\MissingCalculatorException;
use UnitConverter\Registry\UnitRegistryInterface;
use UnitConverter\Unit\UnitInterface;

/**
 * The actual unit converter object. Extend this object
 * if you would like to implement your own custom converter.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class UnitConverter implements UnitConverterInterface
{
    /**
     * @var UnitRegistryInterface $registry The registry that the unit converter accesses available units from
     */
    protected $registry;

    /**
     * @var CalculatorInterface $calculator The converters internal calculator used to handle mathematical operations
     */
    protected $calculator;

    /**
     * @var float $convert The value being converted.
     */
    protected $convert;

    /**
     * @var string $from The unit of measure being converted **from**.
     */
    protected $from;

    /**
     * @var string $to The unit of measure being converted **to**.
     */
    protected $to;

    /**
     * @var int $precision The decimal precision to be calculated
     */
    protected $precision;

    /**
     * @var array $log The log of events for the current conversion calculations
     */
    protected $log;

    /**
     * @var array $tempLog The temporary log that stores running calculations.
     */
    protected $tempLog;

    /**
     * Public constructor function for the UnitConverter class.
     *
     * @param UnitInterface[] $registry A two-dimensional array of UnitInterface objects.
     * @param CalculatorInterface $calculator The calculator that the converter will use to perform mathematical operations.
     */
    public function __construct (UnitRegistryInterface $registry, CalculatorInterface $calculator)
    {
        $this->setRegistry($registry);
        $this->setCalculator($calculator);

        $this->log = [];
        $this->tempLog = [];
    }

    /**
     * @return ConverterBuilder
     */
    public static function createBuilder () {
        return new ConverterBuilder();
    }

    /**
     * Set the unit converter registry for storing units of measure to convert values with.
     *
     * @api
     * @param UnitRegistryInterface $registry An instance of UnitRegistry.
     * @return UnitConverterInterface
     */
    public function setRegistry (UnitRegistryInterface $registry): UnitConverterInterface
    {
        $this->registry = $registry;
        return $this;
    }

    /**
     * Set the unit converter calculator to perform mathematical operations with.
     *
     * @api
     * @param CalculatorInterface $calculator An instance of a CalculatorInterface
     * @return UnitConverterInterface
     */
    public function setCalculator (CalculatorInterface $calculator): UnitConverterInterface
    {
        $this->calculator = $calculator;
        return $this;
    }

    public function convert ($value, int $precision = null): UnitConverterInterface
    {
        $this->percision = $precision;
        $this->convert = $value;
        return $this;
    }

    public function from (string $unit): UnitConverterInterface
    {
        $this->from = $this->loadUnit($unit);
        return $this;
    }

    public function to (string $unit)
    {
        $this->to = $this->loadUnit($unit);
        return $this->calculate(
            $this->convert,
            $this->from,
            $this->to,
            $this->percision
        );
    }

    /**
     * Return an array, containing a list of events in the order they occured for
     * the current calculation.
     *
     * @return array
     */
    public function getConversionLog (): array
    {
        return $this->log;
    }

    /**
     * Calculate the conversion from one unit to another.
     *
     * @internal
     *
     * @throws MissingCalculatorException
     * @param int|float|string $value The initial value being converted.
     * @param UnitInterface $from The unit of measure being converted **from**.
     * @param UnitInterface $to The unit of measure being converted **to**.
     * @param int $precision The decimal percision to be calculated
     * @return int|float|string
     */
    protected function calculate (
        $value,
        UnitInterface $from,
        UnitInterface $to,
        int $precision = null
    ) {
        if ($this->calculatorExists() === false)
            throw new MissingCalculatorException("No calculator was found to perform mathematical operations with.");

        $isBinary = (BinaryCalculator::class === $this->whichCalculator());

        if ($isBinary and $precision) $this->calculator->setPrecision($precision);

        $selfConversion = $from->convert($this->calculator, $value, $to, $precision);

        // FIXME: Gross use of a check for a null convert() method ... 😑 Gotta figure out a better way to use the convert method.
        if ($selfConversion) {
            // TODO: refactor debugging (https://codeclimate.com/github/jordanbrauer/unit-converter/pull/89)
            $result = $selfConversion;
            $parameters = [ 'left' => $value, 'right' => $to->getUnits(), 'precision' => $precision ];
            $log[] = $this->getLogStep('convert', $parameters, $selfConversion);
        } else {
            $fromUnits = $from->getUnits();
            $toUnits = $to->getUnits();

            if ($isBinary) extract($this->castUnitsTo("string"));

            $mulResult = $this->multiply($value, $fromUnits);
            $divResult = $this->divide($mulResult, $toUnits);
            $result = $this->round($divResult, $precision);
        }

        $this->writeLog();

        return $result;
    }

    /**
     * Helper method for multiplying and logging results.
     *
     * @param mixed $leftOperand
     * @param mixed $rightOperand
     * @return mixed
     */
    protected function multiply($leftOperand, $rightOperand)
    {
        $result = $this->calculator->{__FUNCTION__}($leftOperand, $rightOperand);
        $entry = $this->getLogStep(__FUNCTION__, ['left' => $leftOperand, 'right' => $rightOperand], $result);
        $this->logTemp($entry);

        return $result;
    }

    /**
     * Helper method for dividing and logging results.
     *
     * @param mixed $leftOperand
     * @param mixed $rightOperand
     * @return mixed
     */
    protected function divide($leftOperand, $rightOperand)
    {
        $result = $this->calculator->{__FUNCTION__}($leftOperand, $rightOperand);
        $entry = $this->getLogStep(__FUNCTION__, ['left' => $leftOperand, 'right' => $rightOperand], $result);
        $this->logTemp($entry);

        return $result;
    }

    /**
     * Helper method for rounding and logging results.
     *
     * @param mixed $value
     * @param int $percision
     * @return mixed
     */
    protected function round($value, $precision)
    {
        $result = $this->calculator->{__FUNCTION__}($value, $precision);
        $entry = $this->getLogStep(__FUNCTION__, ['value' => $value, 'precision' => $precision], $result);
        $this->logTemp($entry);

        return $result;
    }

    /**
     * Load a unit from the unit converter registry.
     *
     * @internal
     * @uses UnitConverter\UnitRegistry::loadUnit
     *
     * @param string $symbol The symbol of the unit being loaded.
     *
     * @return UnitInterface
     * @throws MissingUnitRegistryException Thrown if an attempt is made to access a non-existent registry.
     */
    protected function loadUnit(string $symbol): UnitInterface
    {
        if ($this->registryExists() === false)
            throw new MissingUnitRegistryException("No unit registry was found to load units from.");

        return $this->registry->loadUnit($symbol);
    }

    /**
     * Determine whether or not the converter has an active registry.
     *
     * @internal
     * @return bool
     */
    protected function registryExists (): bool
    {
        if ($this->registry instanceof UnitRegistryInterface)
            return true;

        return false;
    }

    /**
     * Determine whether or not the converter has an active calculator.
     *
     * @internal
     * @return bool
     */
    protected function calculatorExists (): bool
    {
        if ($this->calculator instanceof CalculatorInterface)
            return true;

        return false;
    }

    /**
     * Determine which calculator is currently being used
     *
     * @internal
     * @return null|string
     */
    protected function whichCalculator (): ?string
    {
        if ($this->calculatorExists())
            return get_class($this->calculator);

        return null;
    }

    /**
     * Returns an array containing the "from" and "to" unit values casted to the specified type.
     *
     * @throws ErrorException When an unsupported type is specified, throws exception.
     *
     * @param string $type The variable type to be casted. Can be one of, "int", "float", or "string".
     * @return array
     */
    protected function castUnitsTo (string $type): array
    {
        $types = ["int", "float", "string"];
        if (!in_array($type, $types))
            throw new \ErrorException("Cannot cast units to {$type}. Use one of, ".implode(", ", $types));

        $units = [
            "fromUnits" => $this->from->getUnits(),
            "toUnits" => $this->to->getUnits(),
        ];

        array_walk($units, function (&$value, $unit) use ($type) {
            settype($value, $type);
        });

        return $units;
    }

    /**
     * Returns an a step entry for the calculation log, with the given parameters.
     *
     * @param array $parameters An array of parametrs used to create the product.
     * @param string $operator The mathematical operator used in the calculation
     * @param int|float|string $result The result of the calculation.
     * @return array
     */
    protected function getLogStep (string $operator, array $parameters = [], $result): array
    {
        return [
            'operator' => $operator,
            'parameters' => $parameters,
            'result' => $result,
        ];
    }

    /**
     * Add an entry to the temporary calculation log.
     *
     * @param array $steps
     * @return void
     */
    protected function logTemp (array $step): void
    {
        array_push($this->tempLog, $step);
    }

    /**
     * Add an entry to the conversion calculation log.
     *
     * @param array $steps (optional)
     * @return void
     */
    protected function writeLog (array $steps = null): void
    {
        $steps = ($steps ?? $this->tempLog);
        if (count($steps) > 0) {
            array_push($this->log, $steps);
            $this->tempLog = [];
        }
    }
}

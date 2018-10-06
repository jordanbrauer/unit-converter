<?php

declare(strict_types = 1);

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

use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Exception\BadConverter;
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
     * A static array of supported scalar types for a unit's value.
     *
     * @var array
     */
    private static $types = ["int", "float", "string"];

    /**
     * The converters internal calculator used to handle mathematical operations
     *
     * @var CalculatorInterface $calculator
     */
    protected $calculator;

    /**
     * The value being converted.
     *
     * @var float $convert
     */
    protected $convert;

    /**
     * The unit of measure being converted **from**.
     *
     * @var string $from
     */
    protected $from;

    /**
     * The log of events for the current conversion calculations
     *
     * @var array $log
     */
    protected $log = [];

    /**
     * Are conversions going to be logged?
     *
     * @var boolean
     */
    protected $logConversions;

    /**
     * The decimal precision to be calculated
     *
     * @var int $precision
     */
    protected $precision;

    /**
     * The registry that the unit converter accesses available units from
     *
     * @var UnitRegistryInterface $registry
     */
    protected $registry;

    /**
     * The temporary log that stores running calculations.
     *
     * @var array $tempLog
     */
    protected $tempLog = [];

    /**
     * The unit of measure being converted **to**.
     *
     * @var string $to
     */
    protected $to;

    /**
     * Public constructor function for the UnitConverter class.
     *
     * @param UnitInterface[] $registry A two-dimensional array of UnitInterface objects.
     * @param CalculatorInterface $calculator The calculator that the converter will use to perform mathematical operations.
     */
    public function __construct(UnitRegistryInterface $registry, CalculatorInterface $calculator)
    {
        $this->setRegistry($registry);
        $this->setCalculator($calculator);
        $this->enableConversionLog();
    }

    /**
     * Returns a builder object for quickly scaffolding out a new converter.
     *
     * @api
     * @return ConverterBuilder
     */
    public static function createBuilder()
    {
        return new ConverterBuilder();
    }

    /**
     * Convert a unit to all other possible units of measurement. The results will
     * be an associative array in the form of `symbol => conversion`.
     *
     * @return array
     */
    public function all()
    {
        $results = [];
        $symbol = $this->from->getSymbol();

        array_map(function ($unit) use (&$results, $symbol) {
            if ($symbol != $unit) {
                $results[$unit] = $this->calculate(
                    $this->convert,
                    $this->from,
                    $this->to = $this->loadUnit($unit), # assignment for ::castUnitsTo
                    $this->percision
                );
            }
        }, $this->registry->listUnits($this->from->getUnitOf()));

        return $results;
    }

    /**
     * {@inheritDoc}
     */
    public function convert($value, int $precision = null): UnitConverterInterface
    {
        $this->percision = $precision;
        $this->convert = $value;

        return $this;
    }

    /**
     * Disables the logging of conversions & their order of operations.
     *
     * @api
     * @return void
     */
    public function disableConversionLog(): void
    {
        $this->logConversions = false;
    }

    /**
     * Enables the logging of conversions & their order of operations.
     *
     * @api
     * @return void
     */
    public function enableConversionLog(): void
    {
        $this->logConversions = true;
    }

    /**
     * {@inheritDoc}
     */
    public function from(string $unit): UnitConverterInterface
    {
        $this->from = $this->loadUnit($unit);

        return $this;
    }

    /**
     * Return an array, containing a list of events in the order they occured for
     * the current calculation.
     *
     * @api
     * @return array
     */
    public function getConversionLog(): array
    {
        return $this->log;
    }

    /**
     * Set the unit converter calculator to perform mathematical operations with.
     *
     * @api
     * @param CalculatorInterface $calculator An instance of a CalculatorInterface
     * @return UnitConverterInterface
     */
    public function setCalculator(CalculatorInterface $calculator): UnitConverterInterface
    {
        $this->calculator = $calculator;

        return $this;
    }

    /**
     * Set the unit converter registry for storing units of measure to convert values with.
     *
     * @api
     * @param UnitRegistryInterface $registry An instance of UnitRegistry.
     * @return UnitConverterInterface
     */
    public function setRegistry(UnitRegistryInterface $registry): UnitConverterInterface
    {
        $this->registry = $registry;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function to(string $unit)
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
     * Calculate the conversion from one unit to another.
     *
     * @internal
     * @throws BadConverter
     * @param int|float|string $value The initial value being converted.
     * @param UnitInterface $from The unit of measure being converted **from**.
     * @param UnitInterface $to The unit of measure being converted **to**.
     * @param int $precision The decimal percision to be calculated
     * @return int|float|string
     */
    protected function calculate(
        $value,
        UnitInterface $from,
        UnitInterface $to,
        int $precision = null
    ) {
        if (!$this->calculatorExists()) {
            throw BadConverter::missingCalculator();
        }

        $isBinary = (BinaryCalculator::class === $this->whichCalculator());

        if ($isBinary and $precision) {
            $this->calculator->setPrecision($precision);
        }

        $selfConversion = $from->convert($this->calculator, $value, $to, $precision);

        // FIXME: Gross use of a check for a null convert() method ... 😑 Gotta figure out a better way to use the convert method.
        if ($selfConversion) {
            // TODO: refactor debugging (https://codeclimate.com/github/jordanbrauer/unit-converter/pull/89)
            $result = $selfConversion;
            $this->logTemp('convert', $result, ['left' => $value, 'right' => $to->getUnits(), 'precision' => $precision]);
        } else {
            $fromUnits = $from->getUnits();
            $toUnits = $to->getUnits();

            if ($isBinary) {
                extract($this->castUnitsTo("string"));
            }

            $mulResult = $this->multiply($value, $fromUnits);
            $divResult = $this->divide($mulResult, $toUnits);
            $result = $this->round($divResult, $precision);
        }

        $this->writeLog();

        return $result;
    }

    /**
     * Determine whether or not the converter has an active calculator.
     *
     * @internal
     * @return bool
     */
    protected function calculatorExists(): bool
    {
        return $this->calculator instanceof CalculatorInterface;
    }

    /**
     * Returns an array containing the "from" and "to" unit values casted to the specified type.
     *
     * @internal
     * @throws BadUnit When an unsupported scalar type is specified, throws exception.
     * @param string $type The variable type to be casted. Can be one of, "int", "float", or "string".
     * @return array
     */
    protected function castUnitsTo(string $type): array
    {
        if (!in_array($type, self::$types)) {
            throw BadUnit::scalar($type, self::$types);
        }

        $units = [
            "fromUnits" => $this->from->getUnits(),
            "toUnits"   => $this->to->getUnits(),
        ];

        array_walk($units, function (&$value, $unit) use ($type) {
            settype($value, $type);
        });

        return $units;
    }

    /**
     * Helper method for dividing and logging results.
     *
     * @internal
     * @param mixed $leftOperand
     * @param mixed $rightOperand
     * @return mixed
     */
    protected function divide($leftOperand, $rightOperand)
    {
        return $this->operation(__FUNCTION__, [
            'left'  => $leftOperand,
            'right' => $rightOperand,
        ]);
    }

    /**
     * Returns an a step entry for the calculation log, with the given parameters.
     *
     * @internal
     * @param array $parameters An array of parametrs used to create the product.
     * @param string $operator The mathematical operator used in the calculation
     * @param int|float|string $result The result of the calculation.
     * @return array
     */
    protected function getLogStep(string $operator, array $parameters = [], $result): array
    {
        return [
            'operator'   => $operator,
            'parameters' => $parameters,
            'result'     => $result,
        ];
    }

    /**
     * Load a unit from the unit converter registry.
     *
     * @internal
     * @uses UnitConverter\UnitRegistry::loadUnit
     * @throws BadConverter Thrown if an attempt is made to access a non-existent registry.
     * @param string $symbol The symbol of the unit being loaded.
     * @return UnitInterface
     */
    protected function loadUnit(string $symbol): UnitInterface
    {
        if (!$this->registryExists()) {
            throw BadConverter::missingRegistry();
        }

        return $this->registry->loadUnit($symbol);
    }

    /**
     * Add an entry to the temporary calculation log.
     *
     * @internal
     * @param string $method The name of the mathematical function be used.
     * @param int|float|string $result The result of the operation.
     * @param array $parameters An associative array of the operations parameters
     * @return void
     */
    protected function logTemp(string $method, $result = null, array $parameters = []): void
    {
        if ($this->logConversions) {
            $this->tempLog[] = $this->getLogStep($method, $parameters, $result);
        }
    }

    /**
     * Helper method for multiplying and logging results.
     *
     * @internal
     * @param mixed $leftOperand
     * @param mixed $rightOperand
     * @return mixed
     */
    protected function multiply($leftOperand, $rightOperand)
    {
        return $this->operation(__FUNCTION__, [
            'left'  => $leftOperand,
            'right' => $rightOperand,
        ]);
    }

    /**
     * Generic helper method to perform calculator operations & log the results.
     *
     * @internal
     * @param string $operator
     * @param array $parameters
     * @return int|float|string
     */
    protected function operation(string $operator, array $parameters = [])
    {
        $result = $this->calculator->{$operator}(...array_values($parameters));
        $this->logTemp($operator, $result, $parameters);

        return $result;
    }

    /**
     * Determine whether or not the converter has an active registry.
     *
     * @internal
     * @return bool
     */
    protected function registryExists(): bool
    {
        return $this->registry instanceof UnitRegistryInterface;
    }

    /**
     * Helper method for rounding and logging results.
     *
     * @internal
     * @param mixed $value
     * @param int $percision
     * @return mixed
     */
    protected function round($value, $precision)
    {
        return $this->operation(__FUNCTION__, [
            'value'     => $value,
            'precision' => $precision,
        ]);
    }

    /**
     * Determine which calculator is currently being used
     *
     * @internal
     * @return null|string
     */
    protected function whichCalculator(): ?string
    {
        if ($this->calculatorExists()) {
            return get_class($this->calculator);
        }

        return null;
    }

    /**
     * Add an entry to the conversion calculation log.
     *
     * @internal
     * @param array $steps (optional)
     * @return void
     */
    protected function writeLog(array $steps = null): void
    {
        $steps = ($steps ?? $this->tempLog);
        if (count($steps) > 0) {
            $this->log[] = $steps;
            $this->tempLog = [];
        }
    }
}

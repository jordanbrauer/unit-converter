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
use UnitConverter\Calculator\Formula\UnitConversionFormula;
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
    const CONVERSION_HASH_LENGTH = [0, 7];

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
    protected $loggingEnabled;

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
     * The unit of measure being converted **to**.
     *
     * @var string $to
     */
    protected $to;

    /**
     * The current conversions unique hash.
     *
     * @var string
     */
    private $hash;

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
    public function all(): array
    {
        $results = [];
        $symbol = $this->from->getSymbol();

        array_map(function ($unit) use (&$results, $symbol) {
            if ($symbol != $unit) {
                $results[$unit] = $this->to($unit);
            }
        }, $this->registry->listUnits($this->from->getUnitOf()));

        return $results;
    }

    /**
     * Determine whether or not the converter has an active calculator.
     *
     * @api
     * @return bool
     */
    public function calculatorExists(): bool
    {
        return $this->calculator instanceof CalculatorInterface;
    }

    /**
     * {@inheritDoc}
     */
    public function convert($value, int $precision = null): UnitConverterInterface
    {
        $this->precision = $precision;
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
        $this->loggingEnabled = false;
    }

    /**
     * Enables the logging of conversions & their order of operations.
     *
     * @api
     * @return void
     */
    public function enableConversionLog(): void
    {
        $this->loggingEnabled = true;
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
     * Return the current calculator instance for the unit converter.
     *
     * @return CalculatorInterface
     */
    public function getCalculator(): CalculatorInterface
    {
        return $this->calculator;
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
     * Return the current registry instance for the unit converter.
     *
     * @return UnitRegistryInterface
     */
    public function getRegistry(): UnitRegistryInterface
    {
        return $this->registry;
    }

    /**
     * Determine whether or not the converter has an active registry.
     *
     * @api
     * @return bool
     */
    public function registryExists(): bool
    {
        return $this->registry instanceof UnitRegistryInterface;
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

        return $this->calculate();
    }

    /**
     * Determine which calculator is currently being used
     *
     * @api
     * @return null|string
     */
    public function whichCalculator(): ?string
    {
        return ($this->calculatorExists())
            ? get_class($this->calculator)
            : null;
    }

    /**
     * Calculate the conversion from one unit to another.
     *
     * @internal
     * @throws BadConverter
     * @return int|float|string
     */
    protected function calculate()
    {
        if (!$this->calculatorExists()) {
            throw BadConverter::missingCalculator();
        }

        if ($this->conversionExists()) {
            return $this->log[$this->getConversionHash()]['result'];
        }

        $fromUnits = $this->from->getUnits();
        $toUnits = $this->to->getUnits();

        if (BinaryCalculator::class === $this->whichCalculator()) {
            extract($this->castUnitsTo("string", $fromUnits, $toUnits));

            if ($this->precision) {
                $this->calculator->setPrecision($this->precision);
            }
        }

        $formula = $this->from->getFormulaFor($this->to) ?? new UnitConversionFormula();
        $result = $this->calculator->exec($formula, $this->convert, $fromUnits, $toUnits, $this->precision);

        $this->writeLog($result, ($this->calculator->dump(true)[0] ?? null));

        return $result;
    }

    /**
     * Returns an array containing the "from" and "to" unit values casted to the specified type.
     *
     * @internal
     * @throws BadUnit When an unsupported scalar type is specified, throws exception.
     * @param string $type The variable type to be casted. Can be one of, "int", "float", or "string".
     * @param int|float|string $fromUnits
     * @param int|float|string $toUnits
     * @return array
     */
    protected function castUnitsTo(string $type, $fromUnits, $toUnits): array
    {
        if (!in_array($type, self::$types)) {
            throw BadUnit::scalar($type, self::$types);
        }

        return array_combine([
            'fromUnits',
            'toUnits',
        ], array_map(function ($value) use ($type) {
            settype($value, $type);

            return $value;
        }, [
            $fromUnits,
            $toUnits,
        ]));
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
     * Add an entry to the conversion calculation log.
     *
     * @internal
     * @param int|float|string $result
     * @param string $calculation
     * @return void
     */
    protected function writeLog($result, string $calculation = null): void
    {
        if ($this->loggingEnabled and $calculation) {
            $this->log[$this->getConversionHash()] = [
                'calculation' => $calculation,
                'value'       => $this->convert,
                'precision'   => $this->precision,
                'from'        => $this->from->getSymbol(),
                'to'          => $this->to->getSymbol(),
                'result'      => $result,
            ];
        }
    }

    /**
     * Generates a conversion hash for the current set of parameters & checks if
     * it matches any previous conversions. If logging is disabled, a conversion
     * hash **will not** be generated & the check will not be made.
     *
     * @return bool
     */
    private function conversionExists(): bool
    {
        return $this->loggingEnabled
            and array_key_exists($this->generateConversionHash(), $this->log);
    }

    /**
     * Sets & returns a unique md5 hash of the current conversion.
     *
     * @return string
     */
    private function generateConversionHash(): string
    {
        $this->hash = mb_substr(md5(
            $this->convert.
            $this->precision.
            $this->from->getRegistryKey().
            $this->to->getSymbol()
        ), ...self::CONVERSION_HASH_LENGTH);

        return $this->hash;
    }

    /**
     * Return a unique md5 hash of the current conversion.
     *
     * @return null|string
     */
    private function getConversionHash(): ?string
    {
        return $this->hash;
    }
}

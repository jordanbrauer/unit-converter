<?php

declare(strict_types = 1);

namespace UnitConverter;

use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Exception\BadMeasurement;
use UnitConverter\Registry\UnitRegistry;

class ConverterBuilder
{
    /**
     * @var CalculatorInterface $calculator
     */
    private $calculator;

    /**
     * @var UnitRegistryInterface $unitRegistry
     */
    private $registry;

    /**
     * Sets the converter's calculator as the binary implementation.
     *
     * @api
     * @return self
     */
    public function addBinaryCalculator()
    {
        $this->calculator = new BinaryCalculator();

        return $this;
    }

    /**
     * Seeds the converter's registry with all default units provided with this
     * package.
     *
     * @api
     * @return self
     */
    public function addDefaultRegistry()
    {
        $this->registry = new UnitRegistry($this->instantiateAllUnits());

        return $this;
    }

    /**
     * Seeds the converter's registry with all units of the given measurement
     * type that are provided with this package.
     *
     * @api
     * @param string $measurement The type of measurement to seed units for.
     * @return self
     */
    public function addRegistryFor(string $measurement)
    {
        $this->registry = new UnitRegistry($this->instantiateAllUnitsFor($measurement));

        return $this;
    }

    /**
     * Seeds the converter's registry with a user-defined subset of units.
     *
     * @api
     * @param UnitInterface[] $units An array of units to add to the registry.
     * @return self
     */
    public function addRegistryWith(array $units = [])
    {
        $this->registry = new UnitRegistry($units);

        return $this;
    }

    /**
     * Set's the converter's calculator as the simple implementation provided
     * with this package.
     *
     * @api
     * @return self
     */
    public function addSimpleCalculator()
    {
        $this->calculator = new SimpleCalculator();

        return $this;
    }

    /**
     * Retrieve a new instance of the unit converter with the configured
     * registry & calculator.
     *
     * @api
     * @return UnitConverter
     */
    public function build()
    {
        return new UnitConverter($this->registry, $this->calculator);
    }

    /**
     * Retrieve instances of all units.
     *
     * @internal
     * @return array
     */
    private function instantiateAllUnits()
    {
        return array_merge(
            $this->instantiateAllUnitsFor(Measure::AREA),
            $this->instantiateAllUnitsFor(Measure::ENERGY),
            $this->instantiateAllUnitsFor(Measure::LENGTH),
            $this->instantiateAllUnitsFor(Measure::MASS),
            $this->instantiateAllUnitsFor(Measure::PLANE_ANGLE),
            $this->instantiateAllUnitsFor(Measure::PRESSURE),
            $this->instantiateAllUnitsFor(Measure::SPEED),
            $this->instantiateAllUnitsFor(Measure::TEMPERATURE),
            $this->instantiateAllUnitsFor(Measure::TIME),
            $this->instantiateAllUnitsFor(Measure::VOLUME)
        );
    }

    /**
     * Retrieve instance of all units for a given measurement type.
     *
     * @internal
     * @param string $measurement
     * @return array
     */
    private function instantiateAllUnitsFor(string $measurement): array
    {
        if (!in_array($measurement, Measure::getDefaultMeasurements())) {
            throw BadMeasurement::unknown($measurement);
        }

        return array_map(function ($class) {
            return new $class();
        }, Measure::getDefaultUnitsFor($measurement));
    }
}

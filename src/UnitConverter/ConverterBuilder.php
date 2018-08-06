<?php

declare(strict_types = 1);

namespace UnitConverter;

use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Exception\BadMeasurement;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Area\Acre;
use UnitConverter\Unit\Area\Hectare;
use UnitConverter\Unit\Area\SquareCentimetre;
use UnitConverter\Unit\Area\SquareFoot;
use UnitConverter\Unit\Area\SquareKilometre;
use UnitConverter\Unit\Area\SquareMetre;
use UnitConverter\Unit\Area\SquareMile;
use UnitConverter\Unit\Area\SquareMillimetre;
use UnitConverter\Unit\Energy\Calorie;
use UnitConverter\Unit\Energy\FootPound;
use UnitConverter\Unit\Energy\Joule;
use UnitConverter\Unit\Energy\Kilojoule;
use UnitConverter\Unit\Energy\KilowattHour;
use UnitConverter\Unit\Energy\Megaelectronvolt;
use UnitConverter\Unit\Energy\Megajoule;
use UnitConverter\Unit\Energy\MegawattHour;
use UnitConverter\Unit\Energy\NewtonMetre;
use UnitConverter\Unit\Energy\WattHour;
use UnitConverter\Unit\Length\AstronomicalUnit;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Decimetre;
use UnitConverter\Unit\Length\Foot;
use UnitConverter\Unit\Length\Hand;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\Unit\Length\Kilometre;
use UnitConverter\Unit\Length\Lightyear;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\Length\Micrometre;
use UnitConverter\Unit\Length\Mile;
use UnitConverter\Unit\Length\Millimetre;
use UnitConverter\Unit\Length\Nanometre;
use UnitConverter\Unit\Length\Parsec;
use UnitConverter\Unit\Length\Picometre;
use UnitConverter\Unit\Length\Yard;
use UnitConverter\Unit\Mass\Gram;
use UnitConverter\Unit\Mass\Kilogram;
use UnitConverter\Unit\Mass\LongTon;
use UnitConverter\Unit\Mass\Milligram;
use UnitConverter\Unit\Mass\Newton;
use UnitConverter\Unit\Mass\Ounce;
use UnitConverter\Unit\Mass\Pound;
use UnitConverter\Unit\Mass\ShortTon;
use UnitConverter\Unit\Mass\Stone;
use UnitConverter\Unit\Mass\Tonne;
use UnitConverter\Unit\PlaneAngle\Degree;
use UnitConverter\Unit\PlaneAngle\Radian;
use UnitConverter\Unit\Pressure\Atmosphere;
use UnitConverter\Unit\Pressure\Bar;
use UnitConverter\Unit\Pressure\Kilopascal;
use UnitConverter\Unit\Pressure\Megapascal;
use UnitConverter\Unit\Pressure\Millibar;
use UnitConverter\Unit\Pressure\Pascal;
use UnitConverter\Unit\Pressure\PoundForcePerSquareInch;
use UnitConverter\Unit\Pressure\Torr;
use UnitConverter\Unit\Speed\KilometrePerHour;
use UnitConverter\Unit\Speed\MetrePerSecond;
use UnitConverter\Unit\Speed\MilePerHour;
use UnitConverter\Unit\Temperature\Celsius;
use UnitConverter\Unit\Temperature\Fahrenheit;
use UnitConverter\Unit\Temperature\Kelvin;
use UnitConverter\Unit\Time\Day;
use UnitConverter\Unit\Time\Hour;
use UnitConverter\Unit\Time\Microsecond;
use UnitConverter\Unit\Time\Millisecond;
use UnitConverter\Unit\Time\Minute;
use UnitConverter\Unit\Time\Month;
use UnitConverter\Unit\Time\Nanosecond;
use UnitConverter\Unit\Time\Second;
use UnitConverter\Unit\Time\Week;
use UnitConverter\Unit\Time\Year;
use UnitConverter\Unit\Volume\CubicMetre;
use UnitConverter\Unit\Volume\Gallon;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\Unit\Volume\Millilitre;
use UnitConverter\Unit\Volume\Pint;

class ConverterBuilder
{
    const ALL_UNIT_METHOD = 'getAll%sUnits';

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
        $this->registry = new UnitRegistry($this->getAllUnitsArray());

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
        $this->registry = new UnitRegistry($this->getAllUnitsFor($measurement));

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
     * Retriece all units of _area_.
     *
     * @internal
     * @return array
     */
    private function getAllAreaUnits(): array
    {
        return [
            new Acre(),
            new Hectare(),
            new SquareCentimetre(),
            new SquareFoot(),
            new SquareKilometre(),
            new SquareMetre(),
            new SquareMile(),
            new SquareMillimetre(),
        ];
    }

    /**
     * Retrieve instances of all units of _energy_.
     *
     * @internal
     * @return array
     */
    private function getAllEnergyUnits(): array
    {
        return [
            new Calorie(),
            new FootPound(),
            new Joule(),
            new Kilojoule(),
            new KilowattHour(),
            new Megaelectronvolt(),
            new Megajoule(),
            new MegawattHour(),
            new NewtonMetre(),
            new WattHour(),
        ];
    }

    /**
     * Retrieve instances of all units of _length_.
     *
     * @internal
     * @return array
     */
    private function getAllLengthUnits(): array
    {
        return [
            new AstronomicalUnit(),
            new Centimetre(),
            new Decimetre(),
            new Foot(),
            new Hand(),
            new Inch(),
            new Kilometre(),
            new Lightyear(),
            new Metre(),
            new Micrometre(),
            new Mile(),
            new Millimetre(),
            new Nanometre(),
            new Parsec(),
            new Picometre(),
            new Yard(),
        ];
    }

    /**
     * Retrieve instances of all units of _mass_.
     *
     * @internal
     * @return array
     */
    private function getAllMassUnits(): array
    {
        return [
            new Gram(),
            new Kilogram(),
            new LongTon(),
            new Milligram(),
            new Newton(),
            new Ounce(),
            new Pound(),
            new ShortTon(),
            new Stone(),
            new Tonne(),
        ];
    }

    /**
     * Retrieve instances of all _plane angle_ units.
     *
     * @internal
     * @return array
     */
    private function getAllPlaneAngleUnits(): array
    {
        return [
            new Degree(),
            new Radian(),
        ];
    }

    /**
     * Retrieve instances of all units of _pressure_.
     *
     * @internal
     * @return array
     */
    private function getAllPressureUnits(): array
    {
        return [
            new Atmosphere(),
            new Bar(),
            new Kilopascal(),
            new Megapascal(),
            new Millibar(),
            new Pascal(),
            new PoundForcePerSquareInch(),
            new Torr(),
        ];
    }

    /**
     * Retrieve instances of all units of _speed_.
     *
     * @internal
     * @return array
     */
    private function getAllSpeedUnits(): array
    {
        return [
            new KilometrePerHour(),
            new MetrePerSecond(),
            new MilePerHour(),
        ];
    }

    /**
     * Retrieve instances of all units of _temperature_.
     *
     * @internal
     * @return array
     */
    private function getAllTemperatureUnits(): array
    {
        return [
            new Celsius(),
            new Fahrenheit(),
            new Kelvin(),
        ];
    }

    /**
     * Retrieve instances of all units of _time_.
     *
     * @internal
     * @return array
     */
    private function getAllTimeUnits(): array
    {
        return [
            new Day(),
            new Hour(),
            new Microsecond(),
            new Millisecond(),
            new Minute(),
            new Month(),
            new Nanosecond(),
            new Second(),
            new Week(),
            new Year(),
        ];
    }

    /**
     * Retrieve instances of all units.
     *
     * @internal
     * @return array
     */
    private function getAllUnitsArray()
    {
        return array_merge(
            $this->getAllAreaUnits(),
            $this->getAllEnergyUnits(),
            $this->getAllLengthUnits(),
            $this->getAllMassUnits(),
            $this->getAllPlaneAngleUnits(),
            $this->getAllPressureUnits(),
            $this->getAllSpeedUnits(),
            $this->getAllTemperatureUnits(),
            $this->getAllTimeUnits(),
            $this->getAllVolumeUnits()
        );
    }

    /**
     * Retrieve instances of all units for a given measurement type.
     *
     * @internal
     * @param string $measurement The measurement type to retrieve all units for.
     * @return array
     */
    private function getAllUnitsFor(string $measurement): array
    {
        if (!in_array($measurement, Measure::getDefaultMeasurements())) {
            throw BadMeasurement::unknown($measurement);
        }

        $measurement = str_replace(['_', '-', '.', ' '], '', $measurement);
        $getAllMeasurementUnits = sprintf(self::ALL_UNIT_METHOD, $measurement);

        return $this->{$getAllMeasurementUnits}();
    }

    /**
     * Retrieve instances of all units of _volume_.
     *
     * @internal
     * @return array
     */
    private function getAllVolumeUnits(): array
    {
        return [
            new CubicMetre(),
            new Gallon(),
            new Litre(),
            new Millilitre(),
            new Pint(),
        ];
    }
}

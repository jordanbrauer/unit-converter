<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter;

use UnitConverter\Unit\Area\Acre;
use UnitConverter\Unit\Area\Hectare;
use UnitConverter\Unit\Area\SquareCentimetre;
use UnitConverter\Unit\Area\SquareFoot;
use UnitConverter\Unit\Area\SquareKilometre;
use UnitConverter\Unit\Area\SquareMetre;
use UnitConverter\Unit\Area\SquareMile;
use UnitConverter\Unit\Area\SquareMillimetre;
use UnitConverter\Unit\DigitalStorage\Bit;
use UnitConverter\Unit\DigitalStorage\Gibibit;
use UnitConverter\Unit\DigitalStorage\Gigabit;
use UnitConverter\Unit\DigitalStorage\Gigabyte;
use UnitConverter\Unit\DigitalStorage\Kibibit;
use UnitConverter\Unit\DigitalStorage\Kilobit;
use UnitConverter\Unit\DigitalStorage\Kilobyte;
use UnitConverter\Unit\DigitalStorage\Mebibit;
use UnitConverter\Unit\DigitalStorage\Megabit;
use UnitConverter\Unit\DigitalStorage\Megabyte;
use UnitConverter\Unit\DigitalStorage\Tebibit;
use UnitConverter\Unit\DigitalStorage\Terabit;
use UnitConverter\Unit\DigitalStorage\Terabyte;
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
use UnitConverter\Unit\Frequency\Gigahertz;
use UnitConverter\Unit\Frequency\Hertz;
use UnitConverter\Unit\Frequency\Kilohertz;
use UnitConverter\Unit\Frequency\Megahertz;
use UnitConverter\Unit\Frequency\Millihertz;
use UnitConverter\Unit\Frequency\Terahertz;
use UnitConverter\Unit\FuelEconomy\KilometrePerLitre;
use UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres;
use UnitConverter\Unit\FuelEconomy\MilesPerGallon;
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
use UnitConverter\Unit\Pressure\Hectopascal;
use UnitConverter\Unit\Pressure\InchesOfMercury;
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

/**
 * A static class containing constants that define the available
 * default types of measurements & the units they govern.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @codeCoverageIgnore
 */
class Measure
{
    const AREA = "area";

    const DIGITAL_STORAGE = "digital_storage";

    const ENERGY = "energy";

    const FREQUENCY = 'frequency';

    const LENGTH = "length";

    const MASS = "mass";

    const PLANE_ANGLE = "plane_angle";

    const PRESSURE = "pressure";

    const SPEED = "speed";

    const TEMPERATURE = "temperature";

    const TIME = "time";

    const VOLUME = "volume";

    /**
     * An array containing a list of default measurement types that are
     * supported, and the unit classes they govern.
     *
     * @var array
     */
    private static $defaultMeasurements = [
        self::LENGTH => [
            AstronomicalUnit::class,
            Centimetre::class,
            Decimetre::class,
            Foot::class,
            Hand::class,
            Inch::class,
            Kilometre::class,
            Lightyear::class,
            Metre::class,
            Micrometre::class,
            Mile::class,
            Millimetre::class,
            Nanometre::class,
            Parsec::class,
            Picometre::class,
            Yard::class,
        ],
        self::AREA => [
            Acre::class,
            Hectare::class,
            SquareCentimetre::class,
            SquareFoot::class,
            SquareKilometre::class,
            SquareMetre::class,
            SquareMile::class,
            SquareMillimetre::class,
        ],
        self::VOLUME => [
            CubicMetre::class,
            Gallon::class,
            Litre::class,
            Millilitre::class,
            Pint::class,
            KilometrePerLitre::class,
            LitrePer100Kilometres::class,
            MilesPerGallon::class,
        ],
        self::MASS => [
            Gram::class,
            Kilogram::class,
            LongTon::class,
            Milligram::class,
            Newton::class,
            Ounce::class,
            Pound::class,
            ShortTon::class,
            Stone::class,
            Tonne::class,
        ],
        self::SPEED => [
            KilometrePerHour::class,
            MetrePerSecond::class,
            MilePerHour::class,
        ],
        self::PLANE_ANGLE => [
            Degree::class,
            Radian::class,
        ],
        self::TEMPERATURE => [
            Celsius::class,
            Fahrenheit::class,
            Kelvin::class,
        ],
        self::PRESSURE => [
            Atmosphere::class,
            Bar::class,
            Hectopascal::class,
            InchesOfMercury::class,
            Kilopascal::class,
            Megapascal::class,
            Millibar::class,
            Pascal::class,
            PoundForcePerSquareInch::class,
            Torr::class,
        ],
        self::TIME => [
            Day::class,
            Hour::class,
            Microsecond::class,
            Millisecond::class,
            Minute::class,
            Month::class,
            Nanosecond::class,
            Second::class,
            Week::class,
            Year::class,
        ],
        self::ENERGY => [
            Calorie::class,
            FootPound::class,
            Joule::class,
            Kilojoule::class,
            KilowattHour::class,
            Megaelectronvolt::class,
            Megajoule::class,
            MegawattHour::class,
            NewtonMetre::class,
            WattHour::class,
        ],
        self::FREQUENCY => [
            Hertz::class,
            Kilohertz::class,
            Megahertz::class,
            Gigahertz::class,
            Terahertz::class,
            Millihertz::class,
        ],
        self::DIGITAL_STORAGE => [
            Bit::class,
            Kilobit::class,
            Megabit::class,
            Gigabit::class,
            Terabit::class,
            Kibibit::class,
            Mebibit::class,
            Gibibit::class,
            Tebibit::class,
            Kilobyte::class,
            Megabyte::class,
            Gigabyte::class,
            Terabyte::class,
        ],
    ];

    /**
     * Return a list of all default supported measurement types. These types
     * govern unit's of measurement.
     *
     * @return array
     */
    public static function getDefaultMeasurements(): array
    {
        return array_keys(static::$defaultMeasurements) ?? [];
    }

    /**
     * Return a list of all default supported units for a given type of
     * measurement.
     *
     * @param string $measurement The measurement type to retrieve units for.
     * @return array
     */
    public static function getDefaultUnitsFor(string $measurement): array
    {
        return static::$defaultMeasurements[$measurement] ?? [];
    }
}

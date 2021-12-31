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

namespace UnitConverter\Tests\Unit;

use PHPUnit\Framework\TestCase;
use UnitConverter\ConverterBuilder;
use UnitConverter\Measure;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\UnitConverter;

/**
 * @coversDefaultClass UnitConverter\ConverterBuilder
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\BinaryCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\Area\Acre
 * @uses UnitConverter\Unit\Area\Hectare
 * @uses UnitConverter\Unit\Area\SquareCentimetre
 * @uses UnitConverter\Unit\Area\SquareFoot
 * @uses UnitConverter\Unit\Area\SquareKilometre
 * @uses UnitConverter\Unit\Area\SquareMetre
 * @uses UnitConverter\Unit\Area\SquareMile
 * @uses UnitConverter\Unit\Area\SquareMillimetre
 * @uses UnitConverter\Unit\DigitalStorage\Bit
 * @uses UnitConverter\Unit\DigitalStorage\Gibibit
 * @uses UnitConverter\Unit\DigitalStorage\Gigabit
 * @uses UnitConverter\Unit\DigitalStorage\Gigabyte
 * @uses UnitConverter\Unit\DigitalStorage\Kibibit
 * @uses UnitConverter\Unit\DigitalStorage\Kilobit
 * @uses UnitConverter\Unit\DigitalStorage\Kilobyte
 * @uses UnitConverter\Unit\DigitalStorage\Mebibit
 * @uses UnitConverter\Unit\DigitalStorage\Megabit
 * @uses UnitConverter\Unit\DigitalStorage\Megabyte
 * @uses UnitConverter\Unit\DigitalStorage\Tebibit
 * @uses UnitConverter\Unit\DigitalStorage\Terabit
 * @uses UnitConverter\Unit\DigitalStorage\Terabyte
 * @uses UnitConverter\Unit\Energy\Calorie
 * @uses UnitConverter\Unit\Energy\FootPound
 * @uses UnitConverter\Unit\Energy\Joule
 * @uses UnitConverter\Unit\Energy\Kilojoule
 * @uses UnitConverter\Unit\Energy\KilowattHour
 * @uses UnitConverter\Unit\Energy\Megaelectronvolt
 * @uses UnitConverter\Unit\Energy\Megajoule
 * @uses UnitConverter\Unit\Energy\MegawattHour
 * @uses UnitConverter\Unit\Energy\NewtonMetre
 * @uses UnitConverter\Unit\Energy\WattHour
 * @uses UnitConverter\Unit\Frequency\Gigahertz
 * @uses UnitConverter\Unit\Frequency\Hertz
 * @uses UnitConverter\Unit\Frequency\Kilohertz
 * @uses UnitConverter\Unit\Frequency\Megahertz
 * @uses UnitConverter\Unit\Frequency\Millihertz
 * @uses UnitConverter\Unit\Frequency\Terahertz
 * @uses UnitConverter\Unit\FuelEconomy\KilometrePerLitre
 * @uses UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Unit\Length\AstronomicalUnit
 * @uses UnitConverter\Unit\Length\Centimetre
 * @uses UnitConverter\Unit\Length\Decimetre
 * @uses UnitConverter\Unit\Length\Foot
 * @uses UnitConverter\Unit\Length\Hand
 * @uses UnitConverter\Unit\Length\Inch
 * @uses UnitConverter\Unit\Length\Kilometre
 * @uses UnitConverter\Unit\Length\Lightyear
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\Length\Micrometre
 * @uses UnitConverter\Unit\Length\Mile
 * @uses UnitConverter\Unit\Length\Millimetre
 * @uses UnitConverter\Unit\Length\Nanometre
 * @uses UnitConverter\Unit\Length\Parsec
 * @uses UnitConverter\Unit\Length\Picometre
 * @uses UnitConverter\Unit\Length\Yard
 * @uses UnitConverter\Unit\Mass\Gram
 * @uses UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\Unit\Mass\LongTon
 * @uses UnitConverter\Unit\Mass\Milligram
 * @uses UnitConverter\Unit\Mass\Newton
 * @uses UnitConverter\Unit\Mass\Ounce
 * @uses UnitConverter\Unit\Mass\Pound
 * @uses UnitConverter\Unit\Mass\ShortTon
 * @uses UnitConverter\Unit\Mass\Stone
 * @uses UnitConverter\Unit\Mass\Tonne
 * @uses UnitConverter\Unit\PlaneAngle\Degree
 * @uses UnitConverter\Unit\PlaneAngle\Radian
 * @uses UnitConverter\Unit\Pressure\Atmosphere
 * @uses UnitConverter\Unit\Pressure\Bar
 * @uses UnitConverter\Unit\Pressure\Kilopascal
 * @uses UnitConverter\Unit\Pressure\Megapascal
 * @uses UnitConverter\Unit\Pressure\Millibar
 * @uses UnitConverter\Unit\Pressure\Pascal
 * @uses UnitConverter\Unit\Pressure\PoundForcePerSquareInch
 * @uses UnitConverter\Unit\Pressure\Torr
 * @uses UnitConverter\Unit\Speed\KilometrePerHour
 * @uses UnitConverter\Unit\Speed\MetrePerSecond
 * @uses UnitConverter\Unit\Speed\MilePerHour
 * @uses UnitConverter\Unit\Temperature\Celsius
 * @uses UnitConverter\Unit\Temperature\Fahrenheit
 * @uses UnitConverter\Unit\Temperature\Kelvin
 * @uses UnitConverter\Unit\Time\Day
 * @uses UnitConverter\Unit\Time\Hour
 * @uses UnitConverter\Unit\Time\Microsecond
 * @uses UnitConverter\Unit\Time\Millisecond
 * @uses UnitConverter\Unit\Time\Minute
 * @uses UnitConverter\Unit\Time\Month
 * @uses UnitConverter\Unit\Time\Nanosecond
 * @uses UnitConverter\Unit\Time\Second
 * @uses UnitConverter\Unit\Time\Week
 * @uses UnitConverter\Unit\Time\Year
 * @uses UnitConverter\Unit\Volume\CubicMetre
 * @uses UnitConverter\Unit\Volume\Gallon
 * @uses UnitConverter\Unit\Volume\Litre
 * @uses UnitConverter\Unit\Volume\Millilitre
 * @uses UnitConverter\Unit\Volume\Pint
 */
class ConverterBuilderSpec extends TestCase
{
    protected function setUp(): void
    {
        $this->builder = new ConverterBuilder();
    }

    protected function tearDown(): void
    {
        unset($this->builder);
    }

    /**
     * @test
     * @covers ::build
     * @covers ::addBinaryCalculator
     * @covers ::addDefaultRegistry
     */
    public function assertBuilderCanConfiguredConverterWithBinaryCalculator()
    {
        $converter = $this->builder
            ->addBinaryCalculator()
            ->addDefaultRegistry()
            ->build();

        $this->assertInstanceOf(UnitConverter::class, $converter);
    }

    /**
     * @test
     * @covers ::build
     * @covers ::addSimpleCalculator
     * @covers ::addRegistryWith
     */
    public function assertBuilderCanConfiguredConverterWithCustomRegistry()
    {
        $converter = $this->builder
            ->addSimpleCalculator()
            ->addRegistryWith([
                new Centimetre(),
                new Inch(),
            ])
            ->build();

        $this->assertInstanceOf(UnitConverter::class, $converter);
    }

    /**
     * @test
     * @covers ::build
     * @covers ::addSimpleCalculator
     * @covers ::addRegistryFor
     */
    public function assertBuilderCanConfiguredConverterWithSpecificRegistry()
    {
        $converter = $this->builder
            ->addSimpleCalculator()
            ->addRegistryFor(Measure::LENGTH)
            ->build();

        $this->assertInstanceOf(UnitConverter::class, $converter);
    }

    /**
     * @test
     * @covers ::build
     * @covers ::addSimpleCalculator
     * @covers ::addDefaultRegistry
     */
    public function assertBuilderReturnsFullyConfiguredConverter()
    {
        $converter = $this->builder
            ->addSimpleCalculator()
            ->addDefaultRegistry()
            ->build();

        $this->assertInstanceOf(UnitConverter::class, $converter);
    }
}

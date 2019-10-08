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

namespace UnitConverter\Tests\Integration\Unit\FuelEconomy;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\FuelEconomy\KilometrePerLitre;
use UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres;
use UnitConverter\Unit\FuelEconomy\MilesPerGallonImperial;
use UnitConverter\Unit\FuelEconomy\MilesPerGallonUS;
use UnitConverter\Unit\FuelEconomy\MilesPerLitre;
use UnitConverter\UnitConverter;

/**
 *
 * @covers UnitConverter\Unit\FuelEconomy\KilometrePerLitre
 * @uses UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToMilesPerGallon
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToLitrePer100Kilometres
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class KilometrePerLitreSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new KilometrePerLitre(),
                new MilesPerGallonUS(),
                new MilesPerGallonImperial(),
                new LitrePer100Kilometres(),
                new MilesPerLitre()
            ]),
            new SimpleCalculator()
        );
    }

    protected function tearDown()
    {
        unset($this->converter);
    }

    /**
     * @test
     */
    public function assert1KilometersPerLitreIs2MilesPerGallon()
    {
        $expected = 2.35;
        $actual = $this->converter
            ->convert(1)
            ->from("km/l")
            ->to("mpg");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert1KilometrePerLitreIs1KilometrePerLitre()
    {
        $expected = 1;
        $actual = $this->converter
            ->convert(1)
            ->from("km/l")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert1KilometersPerLitreIs2MilesPerImperialGallon()
    {
        $expected = 2.82;
        $actual = $this->converter
            ->convert(1)
            ->from("km/l")
            ->to("mpg uk");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert20KilometersPerLitreIs5LitrePer100Kilometres()
    {
        $expected = 5;
        $actual = $this->converter
            ->convert(20)
            ->from("km/l")
            ->to("L/100km");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert13KilometersPerLitreIs8MilesPerLitre()
    {
        $expected = 8.08;
        $actual = $this->converter
            ->convert(13)
            ->from("km/l")
            ->to("mi/l");

        $this->assertEquals($expected, $actual);
    }
}

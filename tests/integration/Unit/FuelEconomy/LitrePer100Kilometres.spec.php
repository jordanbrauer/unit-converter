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
 * @covers UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Unit\FuelEconomy\KilometrePerLitre
 * @uses UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\LitrePer100Kilometres\ToKilometrePerLitre
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\LitrePer100Kilometres\ToMilesPerGallon
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class LitrePer100KilometresSpec extends TestCase
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
    public function assert100LitrePer100KilometresIs1KilometrePerLitre()
    {
        $expected = 100;
        $actual = $this->converter
            ->convert(1)
            ->from("L/100km")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert5LitrePer100KilometresIs1KilometrePerLitre()
    {
        $expected = 20;
        $actual = $this->converter
            ->convert(5)
            ->from("L/100km")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert5LitrePer100KilometresIs20KilometrePerLitre()
    {
        $expected = 20;
        $actual = $this->converter
            ->convert(5)
            ->from("L/100km")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert5LitrePer100KilometresIs47MilesPerUSGallon()
    {
        $expected = 47.04;
        $actual = $this->converter
            ->convert(5)
            ->from("L/100km")
            ->to("mpg");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert5LitrePer100KilometresIs56MilesPerImperialGallon()
    {
        $expected = 56.5;
        $actual = $this->converter
            ->convert(5)
            ->from("L/100km")
            ->to("mpg uk");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert11LitrePer100KilometresIs5MilesPerLitre()
    {
        $expected = 5.65;
        $actual = $this->converter
            ->convert(11)
            ->from("L/100km")
            ->to("mi/l");

        $this->assertEquals($expected, $actual);
    }
}

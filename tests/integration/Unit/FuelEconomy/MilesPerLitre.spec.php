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
 * @covers UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Unit\FuelEconomy\KilometrePerLitre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class MilesPerLitreSpec extends TestCase
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
    public function assert1MilesPerLitreIs1MilesPerLitre()
    {
        $expected = 1;
        $actual = $this->converter
            ->convert(1)
            ->from("mi/l")
            ->to("mi/l");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert15MilesPerLitreIs68MilesPerImperialGallon()
    {
        $expected = 68.19;
        $actual = $this->converter
            ->convert(15)
            ->from("mi/l")
            ->to("mpg uk");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert21MilesPerLitreIs68MilesPerUSGallon()
    {
        $expected = 79.49;
        $actual = $this->converter
            ->convert(21)
            ->from("mi/l")
            ->to("mpg");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert25MilesPerLitreIs40KilometrePerLitre()
    {
        $expected = 40.23;
        $actual = $this->converter
            ->convert(25)
            ->from("mi/l")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert4MilesPerLitreIs15LitrePer100Kilometres()
    {
        $expected = 15.53;
        $actual = $this->converter
            ->convert(4)
            ->from("mi/l")
            ->to("L/100km");

        $this->assertEquals($expected, $actual);
    }
}

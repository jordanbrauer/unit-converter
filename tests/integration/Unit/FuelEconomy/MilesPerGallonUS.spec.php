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
class MilesPerGallonUSSpec extends TestCase
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
    public function assert1MilesPerGallonIs1MilesPerGallon()
    {
        $expected = 1;
        $actual = $this->converter
            ->convert(1)
            ->from("mpg")
            ->to("mpg");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert1MilesPerGallonIs1MilesPerImperialGallon()
    {
        $expected = 1.2;
        $actual = $this->converter
            ->convert(1)
            ->from("mpg")
            ->to("mpg uk");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert1MilesPerGallonIs1KilometrePerLitre()
    {
        $expected = 0.43;
        $actual = $this->converter
            ->convert(1)
            ->from("mpg")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert10KilometersPerLitreIs23LitrePer100Kilometres()
    {
        $expected = 23.52;
        $actual = $this->converter
            ->convert(10)
            ->from("mpg")
            ->to("L/100km");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert3KilometersPerLitreIs1MilesPerLitre()
    {
        $expected = 0.79;
        $actual = $this->converter
            ->convert(3)
            ->from("mpg")
            ->to("mi/l");

        $this->assertEquals($expected, $actual);
    }
}

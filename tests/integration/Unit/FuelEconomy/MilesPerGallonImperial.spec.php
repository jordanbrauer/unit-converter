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
class MilesPerGallonImperialSpec extends TestCase
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
    public function assert1MilesPerImperialGallonIs1MilesPerImperialGallon()
    {
        $expected = 1;
        $actual = $this->converter
            ->convert(1)
            ->from("mpg uk")
            ->to("mpg uk");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert1MilesPerImperialGallonIs1MilesPerGallon()
    {
        $expected = 0.83;
        $actual = $this->converter
            ->convert(1)
            ->from("mpg uk")
            ->to("mpg");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert1MilesPerImperialGallonIs1KilometrePerLitre()
    {
        $expected = 0.35;
        $actual = $this->converter
            ->convert(1)
            ->from("mpg uk")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert10MilesPerImperialGallonIs28LitrePer100Kilometres()
    {
        $expected = 28.25;
        $actual = $this->converter
            ->convert(10)
            ->from("mpg uk")
            ->to("L/100km");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert7MilesPerImperialGallonIs1MilesPerLitre()
    {
        $expected = 1.54;
        $actual = $this->converter
            ->convert(7)
            ->from("mpg uk")
            ->to("mi/l");

        $this->assertEquals($expected, $actual);
    }
}

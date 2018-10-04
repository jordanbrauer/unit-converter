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

namespace UnitConverter\Tests\Integration\Unit\FuelEconomy;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\FuelEconomy\KilometerPerLitre;
use UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres;
use UnitConverter\UnitConverter;

/**
 *
 * @covers UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Unit\FuelEconomy\KilometerPerLitre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
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
                new KilometerPerLitre(),
                new LitrePer100Kilometres()
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
    public function assert100LitrePer100KilometresIs1KilometerPerLitre()
    {
        $expected = 100;
        $actual = $this->converter
            ->convert(1)
            ->from("L/100km")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }
}

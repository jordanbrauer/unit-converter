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
use UnitConverter\Unit\FuelEconomy\MilesPerGallon;
use UnitConverter\UnitConverter;

/**
 *
 * @covers UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Unit\FuelEconomy\KilometerPerLitre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class MilesPerGallonSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new KilometerPerLitre(),
                new MilesPerGallon()
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
    public function assert2decimal35215MilesPerGallonIs1KilometerPerLitre()
    {
        $expected = 1;
        $actual = $this->converter
            ->convert(0.42514)
            ->from("mpg")
            ->to("km/l");

        $this->assertEquals($expected, $actual);
    }
}

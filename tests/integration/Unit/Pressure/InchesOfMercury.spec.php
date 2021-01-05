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

namespace UnitConverter\Tests\Integration\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Pressure\InchesOfMercury;
use UnitConverter\Unit\Pressure\Pascal;
use UnitConverter\UnitConverter;

/**
 * Test that an one inch of mercury is indeed a pound-force per sq in.
 *
 * @covers UnitConverter\Unit\Pressure\PoundForcePerSquareInch
 * @uses UnitConverter\Unit\Pressure\Pascal
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
class InchesOfMercurySpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Pascal(),
                new InchesOfMercury(),
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
    public function assert1InchOfMercuryIs338638867Pascals()
    {
        $expected = 3386.38867;
        $actual = $this->converter
            ->convert(1)
            ->from("inHg")
            ->to("Pa");

        $this->assertEquals($expected, $actual);
    }
}

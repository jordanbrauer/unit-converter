<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Integration\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Pressure\Pascal;
use UnitConverter\Unit\Pressure\PoundForcePerSquareInch;

/**
 * Test that a pound-force per sq in is indeed a pound-force per sq in.
 *
 * @covers UnitConverter\Unit\Pressure\PoundForcePerSquareInch
 * @uses UnitConverter\Unit\Pressure\Pascal
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class PoundForcePerSquareInchSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Pascal,
                new PoundForcePerSquareInch,
            )),
            new SimpleCalculator
        );
    }

    protected function tearDown ()
    {
        unset($this->converter);
    }

    /**
     * @test
     */
    public function assert1PoundForcePerSquareInchIs16894decimal76Pascal ()
    {
        $expected = 6894.76;
        $actual = $this->converter
            ->convert(1)
            ->from("psi")
            ->to("Pa")
            ;

        $this->assertEquals($expected, $actual);
    }
}

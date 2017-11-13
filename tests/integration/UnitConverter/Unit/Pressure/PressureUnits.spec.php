<?php

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types = 1);

namespace UnitConverter\Tests\Integration\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Pressure\Pascal;
use UnitConverter\Unit\Pressure\Kilopascal;
use UnitConverter\Unit\Pressure\PoundForcePerSquareInch as PSI;

/**
 * Test the default pressure units for conversion accuracy.
 */
class PressureUnitsSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Pascal,
                new Kilopascal,
                new PSI,
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
     * @coversNothing
     */
    public function assertZeroCelsiusEqualsTwoHundredSeventyThreeDecimalFifteen ()
    {
        $expected = 6894.76;
        $actual = $this->converter
            ->convert(1)
            ->from("psi")
            ->to("pa")
            ;

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @coversNothing
     */
    public function assert1kpaEquals1000pa()
    {
        $expected = 1000;
        $actual = $this->converter
            ->convert(1)
            ->from("kpa")
            ->to("pa")
            ;

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @coversNothing
     */
    public function assert1000paEquals1kpa()
    {
        $expected = 1;
        $actual = $this->converter
            ->convert(1000)
            ->from("pa")
            ->to("kpa")
            ;

        $this->assertEquals($expected, $actual);
    }

    /**
     * @coversNothing
     */
    public function assert1mpaEquals1000000pa()
    {
        $expected = 1000000;
        $actual = $this->converter
            ->convert(1)
            ->from("mpa")
            ->to("pa")
            ;

        $this->assertEquals($expected, $actual);
    }

    /**
     * @coversNothing
     */
    public function assert1mpaEquals1000kpa()
    {
        $expected = 1000;
        $actual = $this->converter
            ->convert(1)
            ->from("mpa")
            ->to("kpa")
            ;

        $this->assertEquals($expected, $actual);
    }
}

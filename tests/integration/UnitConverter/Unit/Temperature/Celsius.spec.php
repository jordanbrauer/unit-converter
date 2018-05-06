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

namespace UnitConverter\Tests\Integration\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Temperature\Celsius;
use UnitConverter\Unit\Temperature\Fahrenheit;
use UnitConverter\Unit\Temperature\Kelvin;

/**
 * Ensure that Clesius is infact Clesius.
 *
 * @covers UnitConverter\Unit\Temperature\Celsius
 * @uses UnitConverter\Unit\Temperature\Fahrenheit
 * @uses UnitConverter\Unit\Temperature\Kelvin
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class CelsiusSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Celsius,
                new Fahrenheit,
                new Kelvin,
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
    public function assert0CelsiusIs273decimal15Kelvin ()
    {
        $expected = 273.15;
        $actual = $this->converter
            ->convert(0)
            ->from("C")
            ->to("K")
            ;

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert0CelsiusIs32Fahrenheit ()
    {
        $expected = 32;
        $actual = $this->converter
            ->convert(0)
            ->from("C")
            ->to("F")
            ;

        $this->assertEquals($expected, $actual);
    }
}

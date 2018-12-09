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

namespace UnitConverter\Tests\Integration\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Temperature\Celsius;
use UnitConverter\Unit\Temperature\Fahrenheit;
use UnitConverter\Unit\Temperature\Kelvin;
use UnitConverter\UnitConverter;

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
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\Temperature\Celsius\ToKelvin
 * @uses UnitConverter\Calculator\Formula\Temperature\Celsius\ToFahrenheit
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class CelsiusSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Celsius(),
                new Fahrenheit(),
                new Kelvin(),
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
    public function assert0CelsiusIs273decimal15Kelvin()
    {
        $expected = 273.15;
        $actual = $this->converter
            ->convert(0)
            ->from("C")
            ->to("K");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert0CelsiusIs32Fahrenheit()
    {
        $expected = 32;
        $actual = $this->converter
            ->convert(0)
            ->from("C")
            ->to("F");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert1CelsiusIs1Celsius()
    {
        $expected = 1;
        $actual = $this->converter
            ->convert(1)
            ->from("C")
            ->to("C");

        $this->assertEquals($expected, $actual);
    }
}

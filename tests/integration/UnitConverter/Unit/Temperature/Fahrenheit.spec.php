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
 * Ensure that Fahrenheit is Fahrenheit.
 *
 * @covers UnitConverter\Unit\Temperature\Fahrenheit
 * @uses UnitConverter\Unit\Temperature\Kelvin
 * @uses UnitConverter\Unit\Temperature\Celsius
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\Temperature\Fahrenheit\ToKelvin
 * @uses UnitConverter\Calculator\Formula\Temperature\Fahrenheit\ToCelsius
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Calculator\Formula\Temperature\TemperatureFormula
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class FahrenheitSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Fahrenheit(),
                new Kelvin(),
                new Celsius(),
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
    public function assert0FahrenheitIs255decimal37Kelvin()
    {
        $expected = 255.37;
        $actual = $this->converter
            ->convert(0)
            ->from("F")
            ->to("K");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert0FahrenheitIsNegative17decimal7778Celsius()
    {
        $expected = -17.7778;
        $actual = $this->converter
            ->convert(0, 4)
            ->from("F")
            ->to("C");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assert1FahrenheitIs1Fahrenheit()
    {
        $expected = 1;
        $actual = $this->converter
            ->convert(1, 2)
            ->from("F")
            ->to("F");

        $this->assertEquals($expected, $actual);
    }
}

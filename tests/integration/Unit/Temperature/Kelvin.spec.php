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

namespace UnitConverter\Tests\Integration\Unit\Temperature;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Temperature\Celsius;
use UnitConverter\Unit\Temperature\Fahrenheit;
use UnitConverter\Unit\Temperature\Kelvin;
use UnitConverter\UnitConverter;

/**
 * Ensure that Kelvin is Kelvin
 *
 * @covers UnitConverter\Unit\Temperature\Kelvin
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\Temperature\Kelvin\ToFahrenheit
 * @uses UnitConverter\Calculator\Formula\Temperature\Kelvin\ToCelsius
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class KelvinSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAKelvinIsAnSIUnit()
    {
        $result = (new Kelvin())->isSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $k = new Kelvin(1);

        yield from [
            '1 Kelvin is equal to 1 Kelvin'           => [$k, new Kelvin('1'), 0],
            '1 Kelvin is equal to -457.87 Fahrenheit' => [$k, new Fahrenheit(-457.87), 2],
            '1 Kelvin is equal to -272.15 Celsius'    => [$k, new Celsius(-272.15), 2],
        ];
    }
}

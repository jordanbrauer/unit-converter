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
 * Ensure that Fahrenheit is Fahrenheit.
 *
 * @covers UnitConverter\Unit\Temperature\Fahrenheit
 * @uses UnitConverter\ConverterBuilder
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
    public function correctConversions(): Iterator
    {
        $f = new Fahrenheit(1);

        yield from [
            '0 Fahrenheit is equal to 255.37 Kelvin'    => [new Fahrenheit(0), new Kelvin(255.37), 2],
            '1 Fahrenheit is equal to 1 Fahrenheit'     => [$f, new Fahrenheit('1'), 0],
            '1 Fahrenheit is equal to -17.2222 Celsius' => [$f, new Celsius(-17.2222), 4],
        ];
    }
}

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
 * Ensure that Clesius is infact Clesius.
 *
 * @covers UnitConverter\Unit\Temperature\Celsius
 * @uses UnitConverter\ConverterBuilder
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
    public function correctConversions(): Iterator
    {
        $c = new Celsius(0);

        yield from [
            '0 Celsius is equal to 273.15 Kelvin' => [$c, new Kelvin(273.15), 2],
            '0 Celsius is equal to 32 Fahrenheit' => [$c, new Fahrenheit(32.0), 0],
            '1 Celsius is equal to 1.0 Celsius'   => [new Celsius(1), new Celsius('1'), 0],
        ];
    }
}

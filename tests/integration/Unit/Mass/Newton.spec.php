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

namespace UnitConverter\Tests\Integration\Unit\Mass;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Mass\Kilogram;
use UnitConverter\Unit\Mass\Newton;
use UnitConverter\UnitConverter;

/**
 * Ensure that a newton is infact, a newton.
 *
 * @covers UnitConverter\Unit\Mass\Newton
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Mass\Kilogram
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
class NewtonSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $n = new Newton();

        yield from [
            // '1 __ is equal to 1.0 grams' => [$n, new Gram(1.0), 0],
            '1 newton is equal to 9.80665002863885 kilograms' => [$n, new Kilogram(9.80665002863885), 14],
            // '1 __ is equal to 1.0 long tons (imperial tons)' => [$n, new LongTon(1.0), 0],
            // '1 __ is equal to 1.0 milligrams' => [$n, new Milligram(1.0), 0],
            '1 newton is equal to 1 newton' => [$n, new Newton(1.0), 0],
            // '1 __ is equal to 1.0 ounces' => [$n, new Ounce(1.0), 0],
            // '1 __ is equal to 1.0 pounds' => [$n, new Pound(1.0), 0],
            // '1 __ is equal to 1.0 short tons (us ton)' => [$n, new ShortTon(1.0), 0],
            // '1 __ is equal to 1.0 stones' => [$n, new Stone(1.0), 0],
            // '1 __ is equal to 1.0 tonnes' => [$n, new Tonne(1.0), 0],
        ];
    }
}

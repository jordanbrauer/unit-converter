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
use UnitConverter\Unit\Mass\Gram;
use UnitConverter\Unit\Mass\Kilogram;
use UnitConverter\Unit\Mass\LongTon;
use UnitConverter\Unit\Mass\Milligram;
use UnitConverter\Unit\Mass\Newton;
use UnitConverter\Unit\Mass\Ounce;
use UnitConverter\Unit\Mass\Pound;
use UnitConverter\Unit\Mass\ShortTon;
use UnitConverter\Unit\Mass\Stone;
use UnitConverter\Unit\Mass\Tonne;
use UnitConverter\UnitConverter;

/**
 * Ensure that a stone is infact, a stone.
 *
 * @covers UnitConverter\Unit\Mass\Stone
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\Mass\Stone\ToMilligrams
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class StoneSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $st = new Stone();

        yield from [
            '1 stone is equal to 6,350.29 grams'                    => [$st, new Gram(6350.29), 2],
            '1 stone is equal to 6.35029 kilograms'                 => [$st, new Kilogram(6.35029), 5],
            '1 stone is equal to 0.00625 long tons (imperial tons)' => [$st, new LongTon(0.00625), 5],
            '1 stone is equal to 6,350,000 milligrams'              => [$st, new Milligram(6350000), 0],
            // '1 stone is equal to 1.0 newtons' => [$st, new Newton(1.0), 0],
            '1 stone is equal to 224 ounces'                => [$st, new Ounce(224.0), 0],
            '1 stone is equal to 14 pounds'                 => [$st, new Pound(14.0), 0],
            '1 stone is equal to 0.007 short tons (us ton)' => [$st, new ShortTon(0.007), 3],
            '1 stone is equal to 1 stone'                   => [$st, new Stone(1.0), 0],
            '1 stone is equal to 0.00635029 tonnes'         => [$st, new Tonne(0.00635029), 8],
        ];
    }
}

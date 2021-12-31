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
 * Ensure that a long ton is infact, a long ton.
 *
 * @covers UnitConverter\Unit\Mass\LongTon
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Calculator\Formula\Mass\LongTon\ToGrams
 * @uses \UnitConverter\Calculator\Formula\Mass\LongTon\ToMilligrams
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class LongTonSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $wt = new LongTon();

        yield from [
            '1 long ton is equal to 1,016,000 grams'           => [$wt, new Gram(1016000), 0],
            '1 long ton is equal to 1,016.047 kilograms'       => [$wt, new Kilogram(1016.047), 3],
            '1 long ton is equal to 1 long ton (imperial ton)' => [$wt, new LongTon(1.0), 0],
            '1 long ton is equal to 1,016,000,000 milligrams'  => [$wt, new Milligram(1016000000), 0],
            // '1 long ton is equal to 9964.01641818352 newtons' => [$wt, new Newton(9964.01641818352), 18],
            '1 long ton is equal to 35,840 ounces'            => [$wt, new Ounce(35840.0), 0],
            '1 long ton is equal to 2,240 pounds'             => [$wt, new Pound(2240.0), 0],
            '1 long ton is equal to 1.12 short tons (us ton)' => [$wt, new ShortTon(1.12), 2],
            '1 long ton is equal to 160 stones'               => [$wt, new Stone(160.0), 0],
            '1 long ton is equal to 1.01605 tonnes'           => [$wt, new Tonne(1.01605), 5],
        ];
    }
}

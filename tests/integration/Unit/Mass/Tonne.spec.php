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
 * Ensure that a tonne is infact, a tonne.
 *
 * @covers UnitConverter\Unit\Mass\Tonne
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
class TonneSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $t = new Tonne();

        yield from [
            '1 tonne is equal to 1,000,000 grams'                    => [$t, new Gram(1000000.0), 0],
            '1 tonne is equal to 1,000 kilograms'                    => [$t, new Kilogram(1000.0), 0],
            '1 tonne is equal to 0.984206 long tons (imperial tons)' => [$t, new LongTon(0.984206), 6],
            '1 tonne is equal to 1,000,000,000 milligrams'           => [$t, new Milligram(1000000000.0), 0],
            // '1 tonne is equal to 1.0 newtons' => [$t, new Newton(1.0), 0],
            '1 tonne is equal to 35,274 ounces'               => [$t, new Ounce(35274.0), 0],
            '1 tonne is equal to 2,204.62 pounds'             => [$t, new Pound(2204.62), 2],
            '1 tonne is equal to 1.10231 short tons (us ton)' => [$t, new ShortTon(1.10231), 5],
            '1 tonne is equal to 157.473 stones'              => [$t, new Stone(157.473), 3],
            '1 tonne is equal to 1 tonne'                     => [$t, new Tonne(1.0), 0],
        ];
    }
}

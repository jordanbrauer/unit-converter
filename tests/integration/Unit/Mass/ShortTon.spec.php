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
 * Ensure that a short ton is infact, a short ton.
 *
 * @covers UnitConverter\Unit\Mass\ShortTon
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Calculator\Formula\Mass\ShortTon\ToMilligrams
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class ShortTonSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $ton = new ShortTon();

        yield from [
            '1 short tone (us ton) is equal to 907,185 grams'                      => [$ton, new Gram(907185.0), 0],
            '1 short tone (us ton) is equal to 907.1847 kilograms'                 => [$ton, new Kilogram(907.1847), 4],
            '1 short tone (us ton) is equal to 0.892857 long tons (imperial tons)' => [$ton, new LongTon(0.892857), 6],
            '1 short tone (us ton) is equal to 907,200,000 milligrams'             => [$ton, new Milligram(907200000), 0],
            // '1 short tone (us ton) is equal to 1.0 newtons' => [$ton, new Newton(1.0), 0],
            '1 short tone (us ton) is equal to 32,000 ounces'        => [$ton, new Ounce(32000.0), 0],
            '1 short tone (us ton) is equal to 2,000 pounds'         => [$ton, new Pound(2000.0), 0],
            '1 short tone (us ton) is equal to 1 short ton (us ton)' => [$ton, new ShortTon(1.0), 0],
            '1 short tone (us ton) is equal to 142.857 stones'       => [$ton, new Stone(142.857), 3],
            '1 short tone (us ton) is equal to 0.907185 tonnes'      => [$ton, new Tonne(0.907185), 6],
        ];
    }
}

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
 * Ensure that a ounce is infact, a ounce.
 *
 * @covers UnitConverter\Unit\Mass\Ounce
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
class OunceSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $oz = new Ounce();

        yield from [
            '1 ounce is equal to 28.3495 grams'                         => [$oz, new Gram(28.3495), 4],
            '1 ounce is equal to 0.0283495 kilograms'                   => [$oz, new Kilogram(0.0283495), 7],
            '1 ounce is equal to 0.000027902 long tons (imperial tons)' => [$oz, new LongTon(0.000027902), 9],
            '1 ounce is equal to 28,349.5 milligrams'                   => [$oz, new Milligram(28349.5), 1],
            // '1 ounce is equal to 1.0 newtons' => [$oz, new Newton(1.0), 0],
            '1 ounce is equal to 1 ounce'                        => [$oz, new Ounce(1.0), 0],
            '1 ounce is equal to 0.0625 pounds'                  => [$oz, new Pound(0.0625), 4],
            '1 ounce is equal to 0.00003125 short tons (us ton)' => [$oz, new ShortTon(0.00003125), 8],
            '1 ounce is equal to 0.00446428 stones'              => [$oz, new Stone(0.00446428), 8],
            '1 ounce is equal to 0.00002835 tonnes'              => [$oz, new Tonne(0.00002835), 8],
        ];
    }
}

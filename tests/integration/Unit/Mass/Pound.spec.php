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
 * Ensure that a pound is infact, a pound.
 *
 * @covers UnitConverter\Unit\Mass\Pound
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
class PoundSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $lb = new Pound();

        yield from [
            '1 pound is equal to 453.592 grams'                         => [$lb, new Gram(453.592), 3],
            '1 pound is equal to 0.453592 kilograms'                    => [$lb, new Kilogram(0.453592), 6],
            '1 pound is equal to 0.000446428 long tons (imperial tons)' => [$lb, new LongTon(0.000446428), 9],
            '1 pound is equal to 453,592 milligrams'                    => [$lb, new Milligram(453592.0), 0],
            // '1 pound is equal to 1.0 newtons' => [$lb, new Newton(1.0), 0],
            '1 pound is equal to 16 ounces'                  => [$lb, new Ounce(16.0), 0],
            '1 pound is equal to 1 pound'                    => [$lb, new Pound(1.0), 0],
            '1 pound is equal to 0.0005 short tons (us ton)' => [$lb, new ShortTon(0.0005), 4],
            '1 pound is equal to 0.0714285 stones'           => [$lb, new Stone(0.0714285), 7],
            '1 pound is equal to 0.000453592 tonnes'         => [$lb, new Tonne(0.000453592), 9],
        ];
    }
}

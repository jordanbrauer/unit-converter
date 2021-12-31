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
 * Ensure that a milligram is infact, a milligram.
 *
 * @covers UnitConverter\Unit\Mass\Milligram
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
class MilligramSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAMilligramIsASubmultipleSIUnit()
    {
        $result = (new Milligram())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $mg = new Milligram();

        yield from [
            '1 milligram is equal to 0.001 grams'                                => [$mg, new Gram(0.001), 3],
            '1 milligram is equal to 0.000001 kilograms'                         => [$mg, new Kilogram(0.000001), 6],
            '1 milligram is equal to 0.00000000098421 long tons (imperial tons)' => [$mg, new LongTon(0.00000000098421), 14],
            '1 milligram is equal to 1 milligrams'                               => [$mg, new Milligram(1.0), 0],
            // '1 milligram is equal to 1.0 newtons' => [$mg, new Newton(1.0), 0],
            '1 milligram is equal to 0.000035274 ounces'                  => [$mg, new Ounce(0.000035274), 9],
            '1 milligram is equal to 0.0000022046 pounds'                 => [$mg, new Pound(0.0000022046), 10],
            '1 milligram is equal to 0.0000000011023 short tons (us ton)' => [$mg, new ShortTon(0.0000000011023), 13],
            '1 milligram is equal to 0.00000015747 stones'                => [$mg, new Stone(0.00000015747), 11],
            '1 milligram is equal to 0.000000001 tonnes'                  => [$mg, new Tonne(0.000000001), 9],
        ];
    }
}

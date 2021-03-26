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
 * Ensure that a kilogram is a kilogram.
 *
 * @covers UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\ConverterBuilder
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
class KilogramSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAKilogramIsAnSIUnit()
    {
        $result = (new Kilogram())->isSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $kg = new Kilogram();

        yield from [
            '1 kilogram is equal to 1,000 grams'                           => [$kg, new Gram(1000.0), 0],
            '1 kilogram is equal to 1 kilogram'                            => [$kg, new Kilogram(1.0), 0],
            '1 kilogram is equal to 0.000984206 long tons (imperial tons)' => [$kg, new LongTon(0.000984206), 9],
            '1 kilogram is equal to 1,000,000 milligrams'                  => [$kg, new Milligram(1000000.0), 0],
            // '1 kilogram is equal to 9.81 newtons' => [$kg, new Newton(9.81), 2, /* 9 */],
            '1 kilogram is equal to 35.274 ounces'                  => [$kg, new Ounce(35.274), 3],
            '1 kilogram is equal to 2.20462 pounds'                 => [$kg, new Pound(2.20462), 5],
            '1 kilogram is equal to 0.00110231 short tons (us ton)' => [$kg, new ShortTon(0.00110231), 8],
            '1 kilogram is equal to 0.157473 stones'                => [$kg, new Stone(0.157473), 6],
            '1 kilogram is equal to 0.001 tonnes'                   => [$kg, new Tonne(0.001), 3],
        ];
    }
}

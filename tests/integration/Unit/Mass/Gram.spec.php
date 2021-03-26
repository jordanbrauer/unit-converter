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
 * Ensure that a gram is infact, a gram.
 *
 * @covers UnitConverter\Unit\Mass\Gram
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
class GramSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAGramIsAnSISubmultipleUnit()
    {
        $result = (new Gram())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $g = new Gram();

        yield from [
            '1 gram is equal to 1 gram'                                  => [$g, new Gram(1.0), 0],
            '1 gram is equal to 0.001 kilograms'                         => [$g, new Kilogram(0.001), 3],
            '1 gram is equal to 0.00000098421 long tons (imperial tons)' => [$g, new LongTon(0.00000098421), 11],
            '1 gram is equal to 1,000 milligrams'                        => [$g, new Milligram(1000.0), 0],
            // '1 gram is equal to 0.0098 newtons' => [$g, new Newton(0.0098), 4 /*12*/],
            '1 gram is equal to 0.035274 ounces'                   => [$g, new Ounce(0.035274), 6],
            '1 gram is equal to 0.00220462 pounds'                 => [$g, new Pound(0.00220462), 8],
            '1 gram is equal to 0.00000110231 short tons (us ton)' => [$g, new ShortTon(0.00000110231), 11],
            '1 gram is equal to 0.000157473 stones'                => [$g, new Stone(0.000157473), 9],
            '1 gram is equal to 0.000001 tonnes'                   => [$g, new Tonne(0.000001), 6],
        ];
    }
}

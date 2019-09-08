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

namespace UnitConverter\Tests\Integration\Unit\Area;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Area\Acre;
use UnitConverter\Unit\Area\Hectare;
use UnitConverter\Unit\Area\SquareCentimetre;
use UnitConverter\Unit\Area\SquareFoot;
use UnitConverter\Unit\Area\SquareKilometre;
use UnitConverter\Unit\Area\SquareMetre;
use UnitConverter\Unit\Area\SquareMile;
use UnitConverter\Unit\Area\SquareMillimetre;
use UnitConverter\UnitConverter;

/**
 * Ensure that a square metre is infact, a square metre.
 *
 * @covers UnitConverter\Unit\Area\SquareMetre
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
class SquareMetreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $m2 = new SquareMetre(1);

        yield from [
            '1 square metre is equal to 1,000,000 square millimetres' => [$m2, new SquareMillimetre(1000000.0), 0],
            '1 square metre is equal to 10,000 square centimetre'     => [$m2, new SquareCentimetre(10000.0), 0],
            '1 square metre is equal to 1 square metre'               => [$m2, new SquareMetre(1.0), 0],
            '1 square metre is equal to 0.00000038610 square miles'   => [$m2, new SquareMile(0.00000038610), 11],
            '1 square metre is equal to 0.000001 square kilometres'   => [$m2, new SquareKilometre(0.000001), 6],
            '1 square metre is equal to 10.7639 square foot'          => [$m2, new SquareFoot(10.7639), 4],
            '1 square metre is equal to 0.0001 hectare'               => [$m2, new Hectare(0.0001), 4],
            '1 square metre is equal to 0.000247105 acre'             => [$m2, new Acre(0.000247105), 9],
        ];
    }
}

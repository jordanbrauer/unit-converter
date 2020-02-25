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
 * Ensure that a square millimetre is a square millimetre.
 *
 * @covers UnitConverter\Unit\Area\SquareMillimetre
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Area\SquareMetre
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
class SquareMillimetreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mm2 = new SquareMillimetre(1);

        yield from [
            '1 square millimetre is equal to 1 square millimetre'              => [$mm2, new SquareMillimetre(1.0), 0],
            '1 square millimetre is equal to 0.01 square centimetre'           => [$mm2, new SquareCentimetre(0.01), 2],
            '1 square millimetre is equal to 0.000001 square metre'            => [$mm2, new SquareMetre(0.000001), 6],
            '1 square millimetre is equal to 0.00000000000038610 square miles' => [$mm2, new SquareMile(0.00000000000038610), 17],
            '1 square millimetre is equal to 0.000000000001 square kilometres' => [$mm2, new SquareKilometre(0.000000000001), 12],
            '1 square millimetre is equal to 0.0000107640 square foot'         => [$mm2, new SquareFoot(0.000010764), 9],
            '1 square millimetre is equal to 0.0000000001 hectare'             => [$mm2, new Hectare(0.0000000001), 10],
            '1 square millimetre is equal to 0.000000000247110 acre'           => [$mm2, new Acre(0.000000000247110), 15],
        ];
    }
}

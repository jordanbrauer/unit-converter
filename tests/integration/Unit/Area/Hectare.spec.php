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
 * Ensure that a hectare is a hectare.
 *
 * @covers UnitConverter\Unit\Area\Hectare
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
class HectareSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $ha = new Hectare(1);

        yield from [
            '1 hectare is equal to 10,000,000,000 square millimetres' => [$ha, new SquareMillimetre(10000000000.0), 0],
            '1 hectare is equal to 100,000,000 square centimetres'    => [$ha, new SquareCentimetre(100000000.0), 0],
            '1 hectare is equal to 10,000 square metres'              => [$ha, new SquareMetre(10000.0), 0],
            '1 hectare is equal to 0.00386102 square mile'            => [$ha, new SquareMile(0.00386102), 8],
            '1 hectare is equal to 0.01 square kilometres'            => [$ha, new SquareKilometre(0.01), 2],
            '1 hectare is equal to 107,639 square feet'               => [$ha, new SquareFoot(107639.0), 0],
            '1 hectare is equal to 1 hectare'                         => [$ha, new Hectare(1.0), 0],
            '1 hectare is equal to 2.47105 acre'                      => [$ha, new Acre(2.47105), 5],
        ];
    }
}

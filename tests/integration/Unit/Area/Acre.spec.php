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
 * Ensure that an acre is an acre.
 *
 * @covers UnitConverter\Unit\Area\Acre
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
class AcreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $acre = new Acre(1);

        yield from [
            '1 acre is equal to 4,046,860,000 square millimetres' => [$acre, new SquareMillimetre(4046860000.0), 0],
            '1 acre is equal to 40,468,600 square centimetres'    => [$acre, new SquareCentimetre(40468600.0), 0],
            '1 acre is equal to 4,046.86 square metres'           => [$acre, new SquareMetre(4046.86), 2],
            '1 acre is equal to 0.0015625 square mile'            => [$acre, new SquareMile(0.0015625), 7],
            '1 acre is equal to 0.00404686 square kilometres'     => [$acre, new SquareKilometre(0.00404686), 8],
            '1 acre is equal to 43,560 square feet'               => [$acre, new SquareFoot(43560.0), 0],
            '1 acre is equal to 0.404686 hectare'                 => [$acre, new Hectare(0.404686), 6],
            '1 acre is equal to 1 acre'                           => [$acre, new Acre(1.0), 0],
        ];
    }
}

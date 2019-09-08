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
 * Ensure that a square kilometre is a square kilometre.
 *
 * @covers UnitConverter\Unit\Area\SquareKilometre
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
class SquareKilometreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $km2 = new SquareKilometre(1);

        yield from [
            '1 square kilometre is equal to 1,000,000,000,000 square millimetres' => [$km2, new SquareMillimetre(1000000000000.0), 0],
            '1 square kilometre is equal to 10,000,000,000 square centimetres'    => [$km2, new SquareCentimetre(10000000000.0), 0],
            '1 square kilometre is equal to 1,000,000 square metres'              => [$km2, new SquareMetre(1000000.0), 0],
            '1 square kilometre is equal to 0.386102 square miles'                => [$km2, new SquareMile(0.386102), 6],
            '1 square kilometre is equal to 1 square kilometres'                  => [$km2, new SquareKilometre(1.0), 0],
            '1 square kilometre is equal to 10763915 square feet'                 => [$km2, new SquareFoot(10763915.0), 0],
            '1 square kilometre is equal to 100 hectare'                          => [$km2, new Hectare(100.0), 0],
            '1 square kilometre is equal to 247.105 acre'                         => [$km2, new Acre(247.105), 3],
        ];
    }
}

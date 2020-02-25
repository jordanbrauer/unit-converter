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
 * Ensure that a square mile is a square mile.
 *
 * @covers UnitConverter\Unit\Area\SquareMile
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
class SquareMileSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mi2 = new SquareMile(1);

        yield from [
            '1 square mile is equal to 2,589,988,110,000 square millimetres' => [$mi2, new SquareMillimetre(2589988110000.0), 0],
            '1 square mile is equal to 25,899,881,100 square centimetre'     => [$mi2, new SquareCentimetre(25899881100.0), 0],
            '1 square mile is equal to 2,589,988 square metre'               => [$mi2, new SquareMetre(2589988.0), 0],
            '1 square mile is equal to 1 square mile'                        => [$mi2, new SquareMile(1.0), 0],
            '1 square mile is equal to 2.58999 square kilometres'            => [$mi2, new SquareKilometre(2.58999), 5],
            '1 square mile is equal to 27,878,412 square foot'               => [$mi2, new SquareFoot(27878412.0), 0],
            '1 square mile is equal to 258.999 hectare'                      => [$mi2, new Hectare(258.999), 3],
            '1 square mile is equal to 640 acre'                             => [$mi2, new Acre(640.0), 0],
        ];
    }
}

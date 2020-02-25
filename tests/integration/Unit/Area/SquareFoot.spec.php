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
 * Ensure that a square foot is a square foot.
 *
 * @covers UnitConverter\Unit\Area\SquareFoot
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
class SquareFootSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $ft2 = new SquareFoot(1);

        yield from [
            '1 square foot is equal to 92903 square millimetres'          => [$ft2, new SquareMillimetre(92903.0), 0],
            '1 square foot is equal to 929.03 square centimetre'          => [$ft2, new SquareCentimetre(929.03), 2],
            '1 square foot is equal to 0.092903 square metres'            => [$ft2, new SquareMetre(0.092903), 6],
            '1 square foot is equal to 0.000000035870 square miles'       => [$ft2, new SquareMile(0.000000035870), 12],
            '1 square foot is equal to 0.0000000929030 square kilometres' => [$ft2, new SquareKilometre(0.0000000929030), 13],
            '1 square foot is equal to 1 square foot'                     => [$ft2, new SquareFoot(1.0), 0],
            '1 square foot is equal to 0.00000929030 hectare'             => [$ft2, new Hectare(0.00000929030), 11],
            '1 square foot is equal to 0.0000229570 acre'                 => [$ft2, new Acre(0.000022957), 9],
        ];
    }
}

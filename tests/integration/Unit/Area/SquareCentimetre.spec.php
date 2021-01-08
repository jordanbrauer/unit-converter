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
 * Ensure that a square centimetre is a square centimetre.
 *
 * @covers UnitConverter\Unit\Area\SquareCentimetre
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
class SquareCentimetreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $cm2 = new SquareCentimetre(1);

        yield from [
            '1 square centimetre is equal to 100 square millimetres'         => [$cm2, new SquareMillimetre(100.0), 0],
            '1 square centimetre is equal to 1 square centimetre'            => [$cm2, new SquareCentimetre(1.0), 0],
            '1 square centimetre is equal to 0.0001 square metres'           => [$cm2, new SquareMetre(0.0001), 4],
            '1 square centimetre is equal to 0.000000000038610 square miles' => [$cm2, new SquareMile(0.000000000038610), 15],
            '1 square centimetre is equal to 0.0000000001 square kilometres' => [$cm2, new SquareKilometre(0.0000000001), 10],
            '1 square centimetre is equal to 0.00107639 square feet'         => [$cm2, new SquareFoot(0.00107639), 8],
            '1 square centimetre is equal to 0.00000001 hectare'             => [$cm2, new Hectare(0.00000001), 8],
            '1 square centimetre is equal to 0.0000000247110 acre'           => [$cm2, new Acre(0.0000000247110), 13],
        ];
    }
}

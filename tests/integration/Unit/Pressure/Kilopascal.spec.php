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

namespace UnitConverter\Tests\Integration\Unit\Pressure;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Pressure\Atmosphere;
use UnitConverter\Unit\Pressure\Bar;
use UnitConverter\Unit\Pressure\Kilopascal;
use UnitConverter\Unit\Pressure\Megapascal;
use UnitConverter\Unit\Pressure\Millibar;
use UnitConverter\Unit\Pressure\Pascal;
use UnitConverter\Unit\Pressure\PoundForcePerSquareInch;
use UnitConverter\Unit\Pressure\Torr;
use UnitConverter\UnitConverter;

/**
 * Test that a kilopascal is indeed a kilopascal.
 *
 * @covers UnitConverter\Unit\Pressure\Kilopascal
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Pressure\Pascal
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
class KilopascalSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $kpa = new Kilopascal(1);

        yield from [
            '1 kilopascal is equal to 1,000 pascal'                         => [$kpa, new Pascal(1000.0), 0],
            '1 kilopascal is equal to 7.50064 torr'                         => [$kpa, new Torr(7.50064), 5],
            '1 kilopascal is equal to 0.00986923 atmosphere'                => [$kpa, new Atmosphere(0.00986923), 8],
            '1 kilopascal is equal to 10 millibar'                          => [$kpa, new Millibar(10.0), 0],
            '1 kilopascal is equal to 1 kilopascal'                         => [$kpa, new Kilopascal(1.0), 0],
            '1 kilopascal is equal to 0.145038 pound-force per square inch' => [$kpa, new PoundForcePerSquareInch(0.145038), 6],
            '1 kilopascal is equal to 0.01 bar'                             => [$kpa, new Bar(0.01), 2],
            '1 kilopascal is equal to 0.001 megapascal'                     => [$kpa, new Megapascal(0.001), 3],
        ];
    }
}

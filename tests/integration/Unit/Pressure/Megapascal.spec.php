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
 * Test that a megapascal is indeed a megapascal.
 *
 * @covers UnitConverter\Unit\Pressure\Megapascal
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
class MegapascalSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mpa = new Megapascal(1);

        yield from [
            '1 megapascal is equal to 1,000,000 pascal'                    => [$mpa, new Pascal(1000000.0), 0],
            '1 megapascal is equal to 7500.64 torr'                        => [$mpa, new Torr(7500.64), 2],
            '1 megapascal is equal to 9.86923 atmosphere'                  => [$mpa, new Atmosphere(9.86923), 5],
            '1 megapascal is equal to 10,000 millibar'                     => [$mpa, new Millibar(10000.0), 0],
            '1 megapascal is equal to 1,000 kilopascal'                    => [$mpa, new Kilopascal(1000.0), 0],
            '1 megapascal is equal to 145.038 pound-force per square inch' => [$mpa, new PoundForcePerSquareInch(145.038), 3],
            '1 megapascal is equal to 10 bar'                              => [$mpa, new Bar(10.0), 0],
            '1 megapascal is equal to 1 megapascal'                        => [$mpa, new Megapascal(1.0), 0],
        ];
    }
}

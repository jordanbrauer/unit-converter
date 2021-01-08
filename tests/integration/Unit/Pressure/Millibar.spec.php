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
 * Test that a millibar is indeed a millibar.
 *
 * @covers UnitConverter\Unit\Pressure\Millibar
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
class MillibarSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mbar = new Millibar(1);

        yield from [
            '1 millibar is equal to 100 pascal'                            => [$mbar, new Pascal(100.0), 0],
            '1 millibar is equal to 0.750064 torr'                         => [$mbar, new Torr(0.750064), 6],
            '1 millibar is equal to 0.000986923 atmosphere'                => [$mbar, new Atmosphere(0.000986923), 9],
            '1 millibar is equal to 1 millibar'                            => [$mbar, new Millibar(1.0), 0],
            '1 millibar is equal to 0.1 kilopascal'                        => [$mbar, new Kilopascal(0.1), 1],
            '1 millibar is equal to 0.0145038 pound-force per square inch' => [$mbar, new PoundForcePerSquareInch(0.0145038), 7],
            '1 millibar is equal to 0.001 bar'                             => [$mbar, new Bar(0.001), 3],
            '1 millibar is equal to 0.0001 megapascal'                     => [$mbar, new Megapascal(0.0001), 4],
        ];
    }
}

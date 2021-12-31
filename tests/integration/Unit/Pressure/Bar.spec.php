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
 * Test that a bar is indeed a bar.
 *
 * @covers UnitConverter\Unit\Pressure\Bar
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
class BarSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $bar = new Bar(1);

        yield from [
            '1 bar is equal to 100,000 pascal'                      => [$bar, new Pascal(100000.0), 0],
            '1 bar is equal to 750.064 torr'                        => [$bar, new Torr(750.064), 3],
            '1 bar is equal to 0.986923 atmosphere'                 => [$bar, new Atmosphere(0.986923), 6],
            '1 bar is equal to 1,000 millibar'                      => [$bar, new Millibar(1000.0), 0],
            '1 bar is equal to 100 kilopascal'                      => [$bar, new Kilopascal(100.0), 0],
            '1 bar is equal to 14.5038 pound-force per square inch' => [$bar, new PoundForcePerSquareInch(14.5038), 4],
            '1 bar is equal to 1 bar'                               => [$bar, new Bar(1.0), 0],
            '1 bar is equal to 0.1 megapascal'                      => [$bar, new Megapascal(0.1), 1],
        ];
    }
}

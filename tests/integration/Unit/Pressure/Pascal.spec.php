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
 * Test that a pascal is indeed a pascal.
 *
 * @covers UnitConverter\Unit\Pressure\Pascal
 * @uses UnitConverter\ConverterBuilder
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
class PascalSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $pa = new Pascal(1);

        yield from [
            '1 pascal is equal to 1 pascal'                                => [$pa, new Pascal(1.0), 0],
            '1 pascal is equal to 0.00750064 torr'                         => [$pa, new Torr(0.00750064), 8],
            '1 pascal is equal to 0.00000986920 atmosphere'                => [$pa, new Atmosphere(0.00000986920), 11],
            '1 pascal is equal to 0.01 millibar'                           => [$pa, new Millibar(0.01), 2],
            '1 pascal is equal to 0.001 kilopascal'                        => [$pa, new Kilopascal(0.001), 3],
            '1 pascal is equal to 0.000145038 pound-force per square inch' => [$pa, new PoundForcePerSquareInch(0.000145038), 9],
            '1 pascal is equal to 0.00001 bar'                             => [$pa, new Bar(0.00001), 5],
            '1 pascal is equal to 0.000001 megapascal'                     => [$pa, new Megapascal(0.000001), 6],
        ];
    }
}

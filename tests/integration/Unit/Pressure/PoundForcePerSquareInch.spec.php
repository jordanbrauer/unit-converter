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
 * Test that a pound-force per sq in is indeed a pound-force per sq in.
 *
 * @covers UnitConverter\Unit\Pressure\PoundForcePerSquareInch
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
class PoundForcePerSquareInchSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $psi = new PoundForcePerSquareInch(1);

        yield from [
            '1 pound-force per square inch is equal to 6894.76 pascal'                => [$psi, new Pascal(6894.76), 2],
            '1 pound-force per square inch is equal to 51.715 torr'                   => [$psi, new Torr(51.715), 3],
            '1 pound-force per square inch is equal to 0.068046 atmosphere'           => [$psi, new Atmosphere(0.068046), 6],
            '1 pound-force per square inch is equal to 68.9476 millibar'              => [$psi, new Millibar(68.9476), 4],
            '1 pound-force per square inch is equal to 6.89476 kilopascal'            => [$psi, new Kilopascal(6.89476), 5],
            '1 pound-force per square inch is equal to 1 pound-force per square inch' => [$psi, new PoundForcePerSquareInch(1.0), 0],
            '1 pound-force per square inch is equal to 0.0689476 bar'                 => [$psi, new Bar(0.0689476), 7],
            '1 pound-force per square inch is equal to 0.00689476 megapascal'         => [$psi, new Megapascal(0.00689476), 8],
        ];
    }
}

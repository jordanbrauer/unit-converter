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
 * Test that an atmosphere is indeed an atmosphere.
 *
 * @covers UnitConverter\Unit\Pressure\Atmosphere
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
class AtmosphereSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $atm = new Atmosphere(1);

        yield from [
            '1 atmosphere is equal to 101,325 pascal'                      => [$atm, new Pascal(101325.0), 0],
            '1 atmosphere is equal to 760 torr'                            => [$atm, new Torr(760.0), 0],
            '1 atmosphere is equal to 1 atmosphere'                        => [$atm, new Atmosphere(1.0), 0],
            '1 atmosphere is equal to 1013.25 millibar'                    => [$atm, new Millibar(1013.25), 2],
            '1 atmosphere is equal to 101.325 kilopascal'                  => [$atm, new Kilopascal(101.325), 3],
            '1 atmosphere is equal to 14.6959 pound-force per square inch' => [$atm, new PoundForcePerSquareInch(14.6959), 4],
            '1 atmosphere is equal to 1.01325 bar'                         => [$atm, new Bar(1.01325), 5],
            '1 atmosphere is equal to 0.101325 megapascal'                 => [$atm, new Megapascal(0.101325), 6],
        ];
    }
}

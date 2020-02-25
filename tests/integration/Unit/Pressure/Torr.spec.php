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
 * Test that a Torr is indeed a Torr.
 *
 * @covers UnitConverter\Unit\Pressure\Torr
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
class TorrSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $psi = new Torr(1);

        yield from [
            '1 torr is equal to 133.322 pascal'                        => [$psi, new Pascal(133.322), 3],
            '1 torr is equal to 1 torr'                                => [$psi, new Torr(1.0), 0],
            '1 torr is equal to 0.00131578583768696 atmosphere'        => [$psi, new Atmosphere(0.00131578583768696), 17],
            '1 torr is equal to 1.33322 millibar'                      => [$psi, new Millibar(1.33322), 5],
            '1 torr is equal to 0.133322 kilopascal'                   => [$psi, new Kilopascal(0.133322), 6],
            '1 torr is equal to 0.0193368 pound-force per square inch' => [$psi, new PoundForcePerSquareInch(0.019337), 6],
            '1 torr is equal to 0.00133322 bar'                        => [$psi, new Bar(0.00133322), 8],
            '1 torr is equal to 0.000133322 megapascal'                => [$psi, new Megapascal(0.000133322), 9],
        ];
    }
}

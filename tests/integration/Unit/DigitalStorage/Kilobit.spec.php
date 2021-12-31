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

namespace UnitConverter\Tests\Integration\Unit\DigitalStorage;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\DigitalStorage\Bit;
use UnitConverter\Unit\DigitalStorage\Byte;
use UnitConverter\Unit\DigitalStorage\Gibibit;
use UnitConverter\Unit\DigitalStorage\Gigabit;
use UnitConverter\Unit\DigitalStorage\Gigabyte;
use UnitConverter\Unit\DigitalStorage\Kibibit;
use UnitConverter\Unit\DigitalStorage\Kilobit;
use UnitConverter\Unit\DigitalStorage\Kilobyte;
use UnitConverter\Unit\DigitalStorage\Mebibit;
use UnitConverter\Unit\DigitalStorage\Megabit;
use UnitConverter\Unit\DigitalStorage\Megabyte;
use UnitConverter\Unit\DigitalStorage\Tebibit;
use UnitConverter\Unit\DigitalStorage\Terabit;
use UnitConverter\Unit\DigitalStorage\Terabyte;
use UnitConverter\UnitConverter;

/**
 * Test that a kilobit is indeed a kilobit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Kilobit
 * @uses UnitConverter\ConverterBuilder
 * @uses \UnitConverter\Unit\DigitalStorage\Bit
 * @uses \UnitConverter\Unit\AbstractUnit
 * @uses \UnitConverter\UnitConverter
 * @uses \UnitConverter\Calculator\SimpleCalculator
 * @uses \UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\AbstractFormula
 * @uses \UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Registry\UnitRegistry
 * @uses \UnitConverter\Support\ArrayDotNotation
 * @uses \UnitConverter\Support\Collection
 */
class KilobitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $kb = new Kilobit();

        yield from [
            '1 kilobit is equal to 1,000 bits'                => [$kb, new Bit(1000.0), 0],
            '1 kilobit is equal to 125 bytes'                 => [$kb, new Byte(125.0), 0],
            '1 kilobit is equal to 0.00000093132 gibibits'    => [$kb, new Gibibit(0.00000093132), 11],
            '1 kilobit is equal to 0.000001 gigabits'         => [$kb, new Gigabit(0.000001), 6],
            '1 kilobit is equal to 0.000000125 gigabytes'     => [$kb, new Gigabyte(0.000000125), 9],
            '1 kilobit is equal to 0.976563 kibibits'         => [$kb, new Kibibit(0.976563), 6],
            '1 kilobit is equal to 1 kilobit'                 => [$kb, new Kilobit(1.0), 0],
            '1 kilobit is equal to 0.125 kilobytes'           => [$kb, new Kilobyte(0.125), 3],
            '1 kilobit is equal to 0.000953674 mebibits'      => [$kb, new Mebibit(0.000953674), 9],
            '1 kilobit is equal to 0.001 megabits'            => [$kb, new Megabit(0.001), 3],
            '1 kilobit is equal to 0.000125 megabytes'        => [$kb, new Megabyte(0.000125), 6],
            '1 kilobit is equal to 0.00000000090949 tebibits' => [$kb, new Tebibit(0.00000000090949), 14],
            '1 kilobit is equal to 0.000000001 terabits'      => [$kb, new Terabit(0.000000001), 9],
            '1 kilobit is equal to 0.000000000125 terabytes'  => [$kb, new Terabyte(0.000000000125), 12],
        ];
    }
}

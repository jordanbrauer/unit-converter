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
 * Test that a bit is indeed a bit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Bit
 * @uses UnitConverter\ConverterBuilder
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
class BitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $b = new Bit();

        yield from [
            '1 bit is equal to 1 bit'                        => [$b, new Bit(1.0), 0],
            '1 bit is equal to 1.0 bytes'                    => [$b, new Byte(0.125), 3],
            '1 bit is equal to 0.00000000093132 gibibits'    => [$b, new Gibibit(0.00000000093132), 14],
            '1 bit is equal to 0.000000001 gigabits'         => [$b, new Gigabit(0.000000001), 9],
            '1 bit is equal to 0.000000000125 gigabytes'     => [$b, new Gigabyte(0.000000000125), 12],
            '1 bit is equal to 0.000976563 kibibits'         => [$b, new Kibibit(0.000976563), 9],
            '1 bit is equal to 0.001 kilobits'               => [$b, new Kilobit(0.001), 3],
            '1 bit is equal to 0.000125 kilobytes'           => [$b, new Kilobyte(0.000125), 6],
            '1 bit is equal to 0.00000095367 mebibits'       => [$b, new Mebibit(0.00000095367), 11],
            '1 bit is equal to 0.000001 megabits'            => [$b, new Megabit(0.000001), 6],
            '1 bit is equal to 0.000000125 megabytes'        => [$b, new Megabyte(0.000000125), 9],
            '1 bit is equal to 0.00000000000090949 tebibits' => [$b, new Tebibit(0.00000000000090949), 17],
            '1 bit is equal to 0.000000000001 terabits'      => [$b, new Terabit(0.000000000001), 12],
            '1 bit is equal to 0.000000000000125 terabytes'  => [$b, new Terabyte(0.000000000000125), 15],
        ];
    }
}

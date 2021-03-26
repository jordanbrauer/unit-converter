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
 * Test that a byte is indeed a byte.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Byte
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
class ByteSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $b = new Byte();

        yield from [
            '1 byte is equal to 8 bits'                     => [$b, new Bit(8.0), 0],
            '1 byte is equal to 1 byte'                     => [$b, new Byte(1.0), 0],
            '1 byte is equal to 0.0000000074506 gibibits'   => [$b, new Gibibit(0.0000000074506), 13],
            '1 byte is equal to 0.000000008 gigabits'       => [$b, new Gigabit(0.000000008), 9],
            '1 byte is equal to 0.000000001 gigabytes'      => [$b, new Gigabyte(0.000000001), 9],
            '1 byte is equal to 0.0078125 kibibits'         => [$b, new Kibibit(0.0078125), 7],
            '1 byte is equal to 0.008 kilobits'             => [$b, new Kilobit(0.008), 3],
            '1 byte is equal to 0.001 kilobytes'            => [$b, new Kilobyte(0.001), 3],
            '1 byte is equal to 0.0000076294 mebibits'      => [$b, new Mebibit(0.0000076294), 10],
            '1 byte is equal to 0.000008 megabits'          => [$b, new Megabit(0.000008), 6],
            '1 byte is equal to 0.000001 megabytes'         => [$b, new Megabyte(0.000001), 6],
            '1 byte is equal to 0.000000000007276 tebibits' => [$b, new Tebibit(0.000000000007276), 15],
            '1 byte is equal to 0.000000000008 terabits'    => [$b, new Terabit(0.000000000008), 12],
            '1 byte is equal to 0.000000000001 terabytes'   => [$b, new Terabyte(0.000000000001), 12],
        ];
    }
}

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
 * Test that a kibibit is indeed a kibibit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Kibibit
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
class KibibitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $kib = new Kibibit();

        yield from [
            '1 kibibit is equal to 1,024 bits'                => [$kib, new Bit(1024.0), 0],
            '1 kibibit is equal to 128 bytes'                 => [$kib, new Byte(128.0), 0],
            '1 kibibit is equal to 0.00000095367 gibibits'    => [$kib, new Gibibit(0.00000095367), 11],
            '1 kibibit is equal to 0.000001024 gigabits'      => [$kib, new Gigabit(0.000001024), 9],
            '1 kibibit is equal to 0.000000128 gigabytes'     => [$kib, new Gigabyte(0.000000128), 9],
            '1 kibibit is equal to 1 kibibit'                 => [$kib, new Kibibit(1.0), 0],
            '1 kibibit is equal to 1.024 kilobits'            => [$kib, new Kilobit(1.024), 3],
            '1 kibibit is equal to 0.128 kilobytes'           => [$kib, new Kilobyte(0.128), 3],
            '1 kibibit is equal to 0.000976563 mebibits'      => [$kib, new Mebibit(0.000976563), 9],
            '1 kibibit is equal to 0.001024 megabits'         => [$kib, new Megabit(0.001024), 6],
            '1 kibibit is equal to 0.000128 megabytes'        => [$kib, new Megabyte(0.000128), 6],
            '1 kibibit is equal to 0.00000000093132 tebibits' => [$kib, new Tebibit(0.00000000093132), 14],
            '1 kibibit is equal to 0.00000000102 terabits'    => [$kib, new Terabit(0.00000000102), 11],
            '1 kibibit is equal to 0.000000000128 terabytes'  => [$kib, new Terabyte(0.000000000128), 12],
        ];
    }
}

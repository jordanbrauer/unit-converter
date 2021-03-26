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

/**
 * Test that a gibibit is indeed a gibibit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Gibibit
 * @uses \UnitConverter\ConverterBuilder
 * @uses \UnitConverter\Unit\DigitalStorage\Bit
 * @uses \UnitConverter\Unit\AbstractUnit
 * @uses \UnitConverter\UnitConverter
 * @uses \UnitConverter\Calculator\SimpleCalculator
 * @uses \UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\AbstractFormula
 * @uses \UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Gibibit\ToBits
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Gibibit\ToBytes
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Gibibit\ToKibibits
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Gibibit\ToKilobits
 * @uses \UnitConverter\Registry\UnitRegistry
 * @uses \UnitConverter\Support\ArrayDotNotation
 * @uses \UnitConverter\Support\Collection
 */
class GibibitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $gib = new Gibibit();

        yield from [
            '1 gibibit is equal to 1,074,000,000 bits'    => [$gib, new Bit(1074000000), 0],
            '1 gibibit is equal to 134,200,000 bytes'     => [$gib, new Byte(134200000), 0],
            '1 gibibit is equal to 1 gibibit'             => [$gib, new Gibibit(1.0), 0],
            '1 gibibit is equal to 1.07374 gigabits'      => [$gib, new Gigabit(1.07374), 5],
            '1 gibibit is equal to 0.134218 gigabytes'    => [$gib, new Gigabyte(0.134218), 6],
            '1 gibibit is equal to 1,049,000 kibibits'    => [$gib, new Kibibit(1049000), 0],
            '1 gibibit is equal to 1,074,000 kilobits'    => [$gib, new Kilobit(1074000), 0],
            '1 gibibit is equal to 134,218 kilobytes'     => [$gib, new Kilobyte(134218.0), 0],
            '1 gibibit is equal to 1,024 mebibits'        => [$gib, new Mebibit(1024.0), 0],
            '1 gibibit is equal to 1,073.74 megabits'     => [$gib, new Megabit(1073.74), 2],
            '1 gibibit is equal to 134.218 megabytes'     => [$gib, new Megabyte(134.218), 3],
            '1 gibibit is equal to 0.000976563 tebibits'  => [$gib, new Tebibit(0.000976563), 9],
            '1 gibibit is equal to 0.00107374 terabits'   => [$gib, new Terabit(0.00107374), 8],
            '1 gibibit is equal to 0.000134218 terabytes' => [$gib, new Terabyte(0.000134218), 9],
        ];
    }
}

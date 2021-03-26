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
 * Test that a kilobyte is indeed a kilobyte.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Kilobyte
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
class KilobyteSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $kb = new Kilobyte();

        yield from [
            '1 kilobyte is equal to 8,000 bits'              => [$kb, new Bit(8000.0), 0],
            '1 kilobyte is equal to 1,000 bytes'             => [$kb, new Byte(1000.0), 0],
            '1 kilobyte is equal to 0.0000074506 gibibits'   => [$kb, new Gibibit(0.0000074506), 10],
            '1 kilobyte is equal to 0.000008 gigabits'       => [$kb, new Gigabit(0.000008), 6],
            '1 kilobyte is equal to 0.000001 gigabytes'      => [$kb, new Gigabyte(0.000001), 6],
            '1 kilobyte is equal to 7.8125 kibibits'         => [$kb, new Kibibit(7.8125), 4],
            '1 kilobyte is equal to 8 kilobits'              => [$kb, new Kilobit(8.0), 0],
            '1 kilobyte is equal to 1 kilobytes'             => [$kb, new Kilobyte(1.0), 0],
            '1 kilobyte is equal to 0.00762939 mebibits'     => [$kb, new Mebibit(0.00762939), 8],
            '1 kilobyte is equal to 0.008 megabits'          => [$kb, new Megabit(0.008), 3],
            '1 kilobyte is equal to 0.001 megabytes'         => [$kb, new Megabyte(0.001), 3],
            '1 kilobyte is equal to 0.000000007276 tebibits' => [$kb, new Tebibit(0.000000007276), 12],
            '1 kilobyte is equal to 0.000000008 terabits'    => [$kb, new Terabit(0.000000008), 9],
            '1 kilobyte is equal to 0.000000001 terabytes'   => [$kb, new Terabyte(0.000000001), 9],
        ];
    }
}

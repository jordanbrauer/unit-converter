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
 * Test that a megabyte is indeed a megabyte.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Megabyte
 * @uses \UnitConverter\ConverterBuilder
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
class MegabyteSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mb = new Megabyte();

        yield from [
            '1 megabyte is equal to 8,000,000 bits'       => [$mb, new Bit(8000000.0), 0],
            '1 megabyte is equal to 1,000,000 bytes'      => [$mb, new Byte(1000000.0), 0],
            '1 megabyte is equal to 0.00745058 gibibits'  => [$mb, new Gibibit(0.00745058), 8],
            '1 megabyte is equal to 0.008 gigabits'       => [$mb, new Gigabit(0.008), 3],
            '1 megabyte is equal to 0.001 gigabytes'      => [$mb, new Gigabyte(0.001), 3],
            '1 megabyte is equal to 7,812.5 kibibits'     => [$mb, new Kibibit(7812.5), 1],
            '1 megabyte is equal to 8,000 kilobits'       => [$mb, new Kilobit(8000.0), 0],
            '1 megabyte is equal to 1,000 kilobytes'      => [$mb, new Kilobyte(1000.0), 0],
            '1 megabyte is equal to 7.62939 mebibits'     => [$mb, new Mebibit(7.62939), 5],
            '1 megabyte is equal to 8 megabits'           => [$mb, new Megabit(8.0), 0],
            '1 megabyte is equal to 1 megabyte'           => [$mb, new Megabyte(1.0), 0],
            '1 megabyte is equal to 0.000007276 tebibits' => [$mb, new Tebibit(0.000007276), 9],
            '1 megabyte is equal to 0.000008 terabits'    => [$mb, new Terabit(0.000008), 6],
            '1 megabyte is equal to 0.000001 terabytes'   => [$mb, new Terabyte(0.000001), 6],
        ];
    }
}

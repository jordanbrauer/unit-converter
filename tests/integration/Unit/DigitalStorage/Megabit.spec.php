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
 * Test that a megabit is indeed a megabit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Megabit
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
class MegabitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mb = new Megabit();

        yield from [
            '1 megabit is equal to 1,000,000 bits'         => [$mb, new Bit(1000000.0), 0],
            '1 megabit is equal to 125,000 bytes'          => [$mb, new Byte(125000.0), 0],
            '1 megabit is equal to 0.000931323 gibibits'   => [$mb, new Gibibit(0.000931323), 9],
            '1 megabit is equal to 0.001 gigabits'         => [$mb, new Gigabit(0.001), 3],
            '1 megabit is equal to 0.000125 gigabytes'     => [$mb, new Gigabyte(0.000125), 6],
            '1 megabit is equal to 976.563 kibibits'       => [$mb, new Kibibit(976.563), 3],
            '1 megabit is equal to 1,000 kilobits'         => [$mb, new Kilobit(1000.0), 0],
            '1 megabit is equal to 125 kilobytes'          => [$mb, new Kilobyte(125.0), 0],
            '1 megabit is equal to 0.953674 mebibits'      => [$mb, new Mebibit(0.953674), 6],
            '1 megabit is equal to 1 megabit'              => [$mb, new Megabit(1.0), 0],
            '1 megabit is equal to 0.125 megabytes'        => [$mb, new Megabyte(0.125), 3],
            '1 megabit is equal to 0.00000090949 tebibits' => [$mb, new Tebibit(0.00000090949), 11],
            '1 megabit is equal to 0.000001 terabits'      => [$mb, new Terabit(0.000001), 6],
            '1 megabit is equal to 0.000000125 terabytes'  => [$mb, new Terabyte(0.000000125), 9],
        ];
    }
}

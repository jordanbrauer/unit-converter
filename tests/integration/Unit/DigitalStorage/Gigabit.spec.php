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
 * Test that a gigabit is indeed a gigabit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Gigabit
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
class GigabitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $gb = new Gigabit();

        yield from [
            '1 gibibit is equal to 1,000,000,000 bits'   => [$gb, new Bit(1000000000.0), 0],
            '1 gibibit is equal to 125,000,000 bytes'    => [$gb, new Byte(125000000.0), 0],
            '1 gibibit is equal to 0.931323 gibibit'     => [$gb, new Gibibit(0.931323), 6],
            '1 gibibit is equal to 1 gigabits'           => [$gb, new Gigabit(1.0), 0],
            '1 gibibit is equal to 0.125 gigabytes'      => [$gb, new Gigabyte(0.125), 3],
            '1 gibibit is equal to 976,563 kibibits'     => [$gb, new Kibibit(976563.0), 0],
            '1 gibibit is equal to 1,000,000 kilobits'   => [$gb, new Kilobit(1000000.0), 0],
            '1 gibibit is equal to 125,000 kilobytes'    => [$gb, new Kilobyte(125000.0), 0],
            '1 gibibit is equal to 953.674 mebibits'     => [$gb, new Mebibit(953.674), 3],
            '1 gibibit is equal to 1,000 megabits'       => [$gb, new Megabit(1000.0), 0],
            '1 gibibit is equal to 125 megabytes'        => [$gb, new Megabyte(125.0), 0],
            '1 gibibit is equal to 0.000909495 tebibits' => [$gb, new Tebibit(0.000909495), 9],
            '1 gibibit is equal to 0.001 terabits'       => [$gb, new Terabit(0.001), 3],
            '1 gibibit is equal to 0.000125 terabytes'   => [$gb, new Terabyte(0.000125), 6],
        ];
    }
}

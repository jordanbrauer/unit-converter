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
 * Test that a terabyte is indeed a terabyte.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Terabyte
 * @uses UnitConverter\ConverterBuilder
 * @uses \UnitConverter\Unit\DigitalStorage\Bit
 * @uses \UnitConverter\Unit\AbstractUnit
 * @uses \UnitConverter\UnitConverter
 * @uses \UnitConverter\Calculator\SimpleCalculator
 * @uses \UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\AbstractFormula
 * @uses \UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\DigitalStorage\Terabyte\ToKibibits
 * * @uses UnitConverter\Calculator\Formula\DigitalStorage\Terabyte\ToMebibits
 * @uses \UnitConverter\Registry\UnitRegistry
 * @uses \UnitConverter\Support\ArrayDotNotation
 * @uses \UnitConverter\Support\Collection
 */
class TerabyteSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $tb = new Terabyte();

        yield from [
            '1 terabyte is equal to 8,000,000,000,000 bits'  => [$tb, new Bit(8000000000000.0), 0],
            '1 terabyte is equal to 1,000,000,000,000 bytes' => [$tb, new Byte(1000000000000.0), 0],
            '1 terabyte is equal to 7,450.58 gibibits'       => [$tb, new Gibibit(7450.58), 2],
            '1 terabyte is equal to 8,000 gigabits'          => [$tb, new Gigabit(8000.0), 0],
            '1 terabyte is equal to 1,000 gigabytes'         => [$tb, new Gigabyte(1000.0), 0],
            '1 terabyte is equal to 7,813,000,000 kibibits'  => [$tb, new Kibibit(7813000000), 0],
            '1 terabyte is equal to 8,000,000,000 kilobits'  => [$tb, new Kilobit(8000000000.0), 0],
            '1 terabyte is equal to 1,000,000,000 kilobytes' => [$tb, new Kilobyte(1000000000.0), 0],
            '1 terabyte is equal to 7,629,000 mebibits'      => [$tb, new Mebibit(7629000), 0],
            '1 terabyte is equal to 8,000,000 megabits'      => [$tb, new Megabit(8000000.0), 0],
            '1 terabyte is equal to 1,000,000 megabytes'     => [$tb, new Megabyte(1000000.0), 0],
            '1 terabyte is equal to 7.27596 tebibits'        => [$tb, new Tebibit(7.27596), 5],
            '1 terabyte is equal to 8 terabits'              => [$tb, new Terabit(8.0), 0],
            '1 terabyte is equal to 1 terabyte'              => [$tb, new Terabyte(1.0), 0],
        ];
    }
}

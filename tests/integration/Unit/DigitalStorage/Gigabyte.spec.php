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
 * Test that a gigabyte is indeed a gigabyte.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Gigabyte
 * @uses UnitConverter\ConverterBuilder
 * @uses \UnitConverter\Unit\DigitalStorage\Bit
 * @uses \UnitConverter\Unit\AbstractUnit
 * @uses \UnitConverter\UnitConverter
 * @uses \UnitConverter\Calculator\SimpleCalculator
 * @uses \UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\AbstractFormula
 * @uses \UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Gigabyte\ToKibibits
 * @uses \UnitConverter\Registry\UnitRegistry
 * @uses \UnitConverter\Support\ArrayDotNotation
 * @uses \UnitConverter\Support\Collection
 */
class GigabyteSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $gb = new Gigabyte();

        yield from [
            '1 gigabyte is equal to 8,000,000,000 bits'  => [$gb, new Bit(8000000000.0), 0],
            '1 gigabyte is equal to 1,000,000,000 bytes' => [$gb, new Byte(1000000000.0), 0],
            '1 gigabyte is equal to 7.45058 gibibits'    => [$gb, new Gibibit(7.45058), 5],
            '1 gigabyte is equal to 8 gigabits'          => [$gb, new Gigabit(8.0), 0],
            '1 gigabyte is equal to 1 gigabyte'          => [$gb, new Gigabyte(1.0), 0],
            '1 gigabyte is equal to 7,813,000 kibibits'  => [$gb, new Kibibit(7813000), 0],
            '1 gigabyte is equal to 8,000,000 kilobits'  => [$gb, new Kilobit(8000000.0), 0],
            '1 gigabyte is equal to 1,000,000 kilobytes' => [$gb, new Kilobyte(1000000.0), 0],
            '1 gigabyte is equal to 7629.39 mebibits'    => [$gb, new Mebibit(7629.39), 2],
            '1 gigabyte is equal to 8,000 megabits'      => [$gb, new Megabit(8000.0), 0],
            '1 gigabyte is equal to 1,000 megabytes'     => [$gb, new Megabyte(1000.0), 0],
            '1 gigabyte is equal to 0.00727596 tebibits' => [$gb, new Tebibit(0.00727596), 8],
            '1 gigabyte is equal to 0.008 terabits'      => [$gb, new Terabit(0.008), 3],
            '1 gigabyte is equal to 0.001 terabytes'     => [$gb, new Terabyte(0.001), 3],
        ];
    }
}

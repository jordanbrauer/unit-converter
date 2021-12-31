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
 * Test that a terabit is indeed a terabit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Terabit
 * @uses \UnitConverter\ConverterBuilder
 * @uses \UnitConverter\Unit\DigitalStorage\Bit
 * @uses \UnitConverter\Unit\AbstractUnit
 * @uses \UnitConverter\UnitConverter
 * @uses \UnitConverter\Calculator\SimpleCalculator
 * @uses \UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\AbstractFormula
 * @uses \UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Terabit\ToKibibits
 * @uses \UnitConverter\Registry\UnitRegistry
 * @uses \UnitConverter\Support\ArrayDotNotation
 * @uses \UnitConverter\Support\Collection
 */
class TerabitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $tb = new Terabit();

        yield from [
            '1 terabit is equal to 1,000,000,000,000 bits' => [$tb, new Bit(1000000000000.0), 0],
            '1 terabit is equal to 125,000,000,000 bytes'  => [$tb, new Byte(125000000000.0), 0],
            '1 terabit is equal to 931.323 gibibits'       => [$tb, new Gibibit(931.323), 3],
            '1 terabit is equal to 1,000 gigabits'         => [$tb, new Gigabit(1000.0), 0],
            '1 terabit is equal to 125 gigabytes'          => [$tb, new Gigabyte(125.0), 0],
            '1 terabit is equal to 976,600,000 kibibits'   => [$tb, new Kibibit(976600000), 0],
            '1 terabit is equal to 1000000000 kilobits'    => [$tb, new Kilobit(1000000000.0), 0],
            '1 terabit is equal to 125,000,000 kilobytes'  => [$tb, new Kilobyte(125000000.0), 0],
            '1 terabit is equal to 953,674 mebibits'       => [$tb, new Mebibit(953674.0), 0],
            '1 terabit is equal to 1,000,000 megabits'     => [$tb, new Megabit(1000000.0), 0],
            '1 terabit is equal to 125,000 megabytes'      => [$tb, new Megabyte(125000.0), 0],
            '1 terabit is equal to 0.909495 tebibits'      => [$tb, new Tebibit(0.909495), 6],
            '1 terabit is equal to 1 terabit'              => [$tb, new Terabit(1.0), 0],
            '1 terabit is equal to 0.125 terabytes'        => [$tb, new Terabyte(0.125), 3],
        ];
    }
}

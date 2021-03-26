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
 * Test that a tebibit is indeed a tebibit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Tebibit
 * @uses \UnitConverter\ConverterBuilder
 * @uses \UnitConverter\Unit\DigitalStorage\Bit
 * @uses \UnitConverter\Unit\AbstractUnit
 * @uses \UnitConverter\UnitConverter
 * @uses \UnitConverter\Calculator\SimpleCalculator
 * @uses \UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\AbstractFormula
 * @uses \UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToBits
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToBytes
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToGibibits
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToKibibits
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToKilobits
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToKilobytes
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToMebibits
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToMegabits
 * @uses \UnitConverter\Registry\UnitRegistry
 * @uses \UnitConverter\Support\ArrayDotNotation
 * @uses \UnitConverter\Support\Collection
 */
class TebibitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $tib = new Tebibit();

        yield from [
            '1 tebibit is equal to 1,100,000,000,000 bits' => [$tib, new Bit(1100000000000), 0],
            '1 tebibit is equal to 137,400,000,000 bytes'  => [$tib, new Byte(137400000000), 0],
            '1 tebibit is equal to 1,024 gibibits'         => [$tib, new Gibibit(1024.0), 0],
            '1 tebibit is equal to 1099.51 gigabits'       => [$tib, new Gigabit(1099.51), 2],
            '1 tebibit is equal to 137.439 gigabytes'      => [$tib, new Gigabyte(137.439), 3],
            '1 tebibit is equal to 1,074,000,000 kibibits' => [$tib, new Kibibit(1074000000), 0],
            '1 tebibit is equal to 1,100,000,000 kilobits' => [$tib, new Kilobit(1100000000), 0],
            '1 tebibit is equal to 137,400,000 kilobytes'  => [$tib, new Kilobyte(137400000), 0],
            '1 tebibit is equal to 1,049,000 mebibits'     => [$tib, new Mebibit(1049000), 0],
            '1 tebibit is equal to 1,100,000 megabits'     => [$tib, new Megabit(1100000), 0],
            '1 tebibit is equal to 137,439 megabytes'      => [$tib, new Megabyte(137439.0), 0],
            '1 tebibit is equal to 1 tebibit'              => [$tib, new Tebibit(1.0), 0],
            '1 tebibit is equal to 1.09951 terabits'       => [$tib, new Terabit(1.09951), 5],
            '1 tebibit is equal to 0.137439 terabytes'     => [$tib, new Terabyte(0.137439), 6],
        ];
    }
}

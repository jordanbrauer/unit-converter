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
 * Test that a mebibit is indeed a mebibit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Mebibit
 * @uses UnitConverter\ConverterBuilder
 * @uses \UnitConverter\Unit\DigitalStorage\Bit
 * @uses \UnitConverter\Unit\AbstractUnit
 * @uses \UnitConverter\UnitConverter
 * @uses \UnitConverter\Calculator\SimpleCalculator
 * @uses \UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\AbstractFormula
 * @uses \UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Calculator\Formula\DigitalStorage\Mebibit\ToBits
 * @uses \UnitConverter\Registry\UnitRegistry
 * @uses \UnitConverter\Support\ArrayDotNotation
 * @uses \UnitConverter\Support\Collection
 */
class MebibitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mib = new Mebibit();

        yield from [
            '1 mebibit is equal to 1,049,000 bits'          => [$mib, new Bit(1049000), 0],
            '1 mebibit is equal to 131,072 bytes'           => [$mib, new Byte(131072.0), 0],
            '1 mebibit is equal to 0.000976563 gibibits'    => [$mib, new Gibibit(0.000976563), 9],
            '1 mebibit is equal to 0.00104858 gigabits'     => [$mib, new Gigabit(0.00104858), 8],
            '1 mebibit is equal to 0.000131072 gigabytes'   => [$mib, new Gigabyte(0.000131072), 9],
            '1 mebibit is equal to 1,024 kibibits'          => [$mib, new Kibibit(1024.0), 0],
            '1 mebibit is equal to 1048.58 kilobits'        => [$mib, new Kilobit(1048.58), 2],
            '1 mebibit is equal to 131.072 kilobytes'       => [$mib, new Kilobyte(131.072), 3],
            '1 mebibit is equal to 1 mebibit'               => [$mib, new Mebibit(1.0), 0],
            '1 mebibit is equal to 1.04858 megabits'        => [$mib, new Megabit(1.04858), 5],
            '1 mebibit is equal to 0.131072 megabytes'      => [$mib, new Megabyte(0.131072), 6],
            '1 mebibit is equal to 0.00000095367 tebibits'  => [$mib, new Tebibit(0.00000095367), 11],
            '1 mebibit is equal to 0.0000010486 terabits'   => [$mib, new Terabit(0.0000010486), 10],
            '1 mebibit is equal to 0.00000013107 terabytes' => [$mib, new Terabyte(0.00000013107), 11],
        ];
    }
}

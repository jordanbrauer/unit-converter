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

namespace UnitConverter\Tests\Integration\Unit\Time;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Time\Day;
use UnitConverter\Unit\Time\Hour;
use UnitConverter\Unit\Time\Microsecond;
use UnitConverter\Unit\Time\Millisecond;
use UnitConverter\Unit\Time\Minute;
use UnitConverter\Unit\Time\Month;
use UnitConverter\Unit\Time\Nanosecond;
use UnitConverter\Unit\Time\Second;
use UnitConverter\Unit\Time\Week;
use UnitConverter\Unit\Time\Year;

/**
 * Ensure that a microsecond is infact, a microsecond.
 *
 * @covers UnitConverter\Unit\Time\Microsecond
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Time\Second
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class MicrosecondSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAMicrosecondIsASubmultipleSIUnit()
    {
        $result = (new Microsecond())->isSubmultipleSiUnit();

        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $us = new Microsecond(1);

        yield from [
            '1 microsecond is equal to 1,000 nanoseconds'           => [$us, new Nanosecond(1000.0), 0],
            '1 microsecond is equal to 1 microseconds'              => [$us, new Microsecond(1.0), 0],
            '1 microsecond is equal to 0.001 milliseconds'          => [$us, new Millisecond(0.001), 3],
            '1 microsecond is equal to 0.000001 seconds'            => [$us, new Second(0.000001), 6],
            '1 microsecond is equal to 0.0000000166670 minutes'     => [$us, new Minute(0.0000000166670), 13],
            '1 microsecond is equal to 0.000000000277780 hours'     => [$us, new Hour(0.000000000277780), 15],
            '1 microsecond is equal to 0.0000000000115740 days'     => [$us, new Day(0.0000000000115740), 16],
            '1 microsecond is equal to 0.00000000000165340 weeks'   => [$us, new Week(0.00000000000165340), 17],
            '1 microsecond is equal to 0.000000000000380520 months' => [$us, new Month(0.000000000000380520), 18],
            '1 microsecond is equal to 0.00000000000003171 years'   => [$us, new Year(0.00000000000003171), 17],
        ];
    }
}

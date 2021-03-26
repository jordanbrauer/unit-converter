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
use UnitConverter\UnitConverter;

/**
 * Ensure that a millisecond is infact, a millisecond.
 *
 * @covers UnitConverter\Unit\Time\Millisecond
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
class MillisecondSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAMillisecondIsASubmultipleSIUnit()
    {
        $result = (new Millisecond())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $ms = new Millisecond(1);

        yield from [
            '1 millisecond is equal to 1,000,000 nanoseconds'    => [$ms, new Nanosecond(1000000.0), 0],
            '1 millisecond is equal to 1,000 microseconds'       => [$ms, new Microsecond(1000.0), 0],
            '1 millisecond is equal to 1 milliseconds'           => [$ms, new Millisecond(1.0), 0],
            '1 millisecond is equal to 0.001 seconds'            => [$ms, new Second(0.001), 3],
            '1 millisecond is equal to 0.000016667 minutes'      => [$ms, new Minute(0.000016667), 9],
            '1 millisecond is equal to 0.00000027778 hours'      => [$ms, new Hour(0.00000027778), 12],
            '1 millisecond is equal to 0.0000000115740 days'     => [$ms, new Day(0.0000000115740), 13],
            '1 millisecond is equal to 0.00000000165340 weeks'   => [$ms, new Week(0.00000000165340), 14],
            '1 millisecond is equal to 0.000000000380520 months' => [$ms, new Month(0.000000000380520), 15],
            '1 millisecond is equal to 0.000000000031710 years'  => [$ms, new Year(0.000000000031710), 15],
        ];
    }
}

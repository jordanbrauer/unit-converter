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
 * Ensure that a month is infact, a month.
 *
 * @covers UnitConverter\Unit\Time\Month
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
class MonthSpec extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function assertMonthsWith30DaysAreProperlyDetected()
    {
        $months = Month::MID_DAY_COUNT_MONTHS;

        foreach ($months as $month) {
            $this->assertFalse(Month::hasNumberOfDays($month, 28));
            $this->assertFalse(Month::hasNumberOfDays($month, 29));
            $this->assertTrue(Month::hasNumberOfDays($month, 30));
            $this->assertFalse(Month::hasNumberOfDays($month, 31));
        }
    }

    /**
     * @test
     * @return void
     */
    public function assertMonthsWith31DaysAreProperlyDetected()
    {
        $months = Month::HIGH_DAY_COUNT_MONTHS;

        foreach ($months as $month) {
            $this->assertFalse(Month::hasNumberOfDays($month, 28));
            $this->assertFalse(Month::hasNumberOfDays($month, 29));
            $this->assertFalse(Month::hasNumberOfDays($month, 30));
            $this->assertTrue(Month::hasNumberOfDays($month, 31));
        }
    }

    /**
     * @test
     * @return void
     */
    public function assertMonthsWithLessThan30DaysAreProperlyDetected()
    {
        $months = Month::LOW_DAY_COUNT_MONTHS;

        foreach ($months as $month) {
            $this->assertTrue(Month::hasNumberOfDays($month, 28));
            $this->assertTrue(Month::hasNumberOfDays($month, 29));
            $this->assertFalse(Month::hasNumberOfDays($month, 30));
            $this->assertFalse(Month::hasNumberOfDays($month, 31));
        }
    }

    public function correctConversions(): Iterator
    {
        $mo = new Month(1);

        yield from [
            '1 month is equal to 2,628,000,000,000,000 nanoseconds' => [$mo, new Nanosecond(2628000000000000.0), 0],
            '1 month is equal to 2,628,000,000,000 microseconds'    => [$mo, new Microsecond(2628000000000.0), 0],
            '1 month is equal to 2,628,000,000 milliseconds'        => [$mo, new Millisecond(2628000000.0), 0],
            '1 month is equal to 2,628,000 seconds'                 => [$mo, new Second(2628000.0), 0],
            '1 month is equal to 43800 minutes'                     => [$mo, new Minute(43800.0), 0],
            '1 month is equal to 730.001 hours'                     => [$mo, new Hour(730.0), 0],
            '1 month is equal to 30.4167 days'                      => [$mo, new Day(30.4167), 4],
            '1 month is equal to 4.34524 weeks'                     => [$mo, new Week(4.34524), 5],
            '1 month is equal to 1 month'                           => [$mo, new Month(1.0), 0],
            '1 month is equal to 0.083333 years'                    => [$mo, new Year(0.083333), 6],
        ];
    }
}

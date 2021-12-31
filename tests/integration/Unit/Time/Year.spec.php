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
 * Ensure that a year is infact, a year.
 *
 * @covers UnitConverter\Unit\Time\Year
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 * @uses UnitConverter\Unit\Time\Second
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Registry\UnitRegistry
 */
class YearSpec extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function assertLeapYearsAreProperlyDetected(): void
    {
        $leapYears = [2000, 2004, 2008, 2012, 2016, 2020];
        foreach ($leapYears as $leapYear) {
            $this->assertTrue(Year::isLeapYear($leapYear));
        }

        $regularYears = array_diff(range(2000, 2020), $leapYears);
        $regularYears = array_merge($regularYears, [1800, 1900, 2100, 2200, 2300, 2500]);
        foreach ($regularYears as $year) {
            $this->assertFalse(Year::isLeapYear($year));
        }
    }

    public function correctConversions(): Iterator
    {
        $y = new Year(1);

        yield from [
            '1 year is equal to 31,536,000,000,000,000 nanoseconds' => [$y, new Nanosecond(31536000000000000.0), 0],
            '1 year is equal to 31,536,000,000,000 microseconds'    => [$y, new Microsecond(31536000000000.0), 0],
            '1 year is equal to 31,536,000,000 milliseconds'        => [$y, new Millisecond(31536000000.0), 0],
            '1 year is equal to 31,536,000 seconds'                 => [$y, new Second(31536000.0), 0],
            '1 year is equal to 525600 minutes'                     => [$y, new Minute(525600.0), 0],
            '1 year is equal to 8760 hours'                         => [$y, new Hour(8760.0), 0],
            '1 year is equal to 365 days'                           => [$y, new Day(365.0), 0],
            '1 year is equal to 52.1429 weeks'                      => [$y, new Week(52.1429), 4],
            '1 year is equal to 12 months'                          => [$y, new Month(12.0), 6],
            '1 year is equal to 1 year'                             => [$y, new Year(1.0), 0],
        ];
    }
}

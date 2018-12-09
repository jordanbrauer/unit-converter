<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Integration\Unit\Time;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Time\Month;
use UnitConverter\Unit\Time\Second;
use UnitConverter\UnitConverter;

/**
 * Ensure that a month is infact, a month.
 *
 * @covers UnitConverter\Unit\Time\Month
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
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Second(),
                new Month(),
            ]),
            new SimpleCalculator()
        );
    }

    protected function tearDown()
    {
        unset($this->converter);
    }

    /**
     * @test
     */
    public function assert1MonthIs2678400Seconds()
    {
        $expected = 2678400;
        $actual = $this->converter
            ->convert(1)
            ->from("mo")
            ->to("s");

        $this->assertEquals($expected, $actual);
    }

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
}

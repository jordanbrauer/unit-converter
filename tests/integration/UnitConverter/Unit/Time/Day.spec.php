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
 * Ensure that a day is infact, a day.
 *
 * @covers UnitConverter\Unit\Time\Day
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
class DaySpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $d = new Day(1);

        yield from [
            '1 day is equal to 86,400,000,000,000 nanoseconds' => [$d, new Nanosecond(86400000000000.0), 0],
            '1 day is equal to 86,400,000,000 microseconds'    => [$d, new Microsecond(86400000000.0), 0],
            '1 day is equal to 86,400,000 milliseconds'        => [$d, new Millisecond(86400000.0), 0],
            '1 day is equal to 86,400 seconds'                 => [$d, new Second(86400.0), 0],
            '1 day is equal to 1,440 minutes'                  => [$d, new Minute(1440.0), 0],
            '1 day is equal to 24 hours'                       => [$d, new Hour(24.0), 0],
            '1 day is equal to 1 day'                          => [$d, new Day(1.0), 0],
            '1 day is equal to 0.142857 weeks'                 => [$d, new Week(0.142857), 6],
            '1 day is equal to 0.0328767 months'               => [$d, new Month(0.0328767), 7],
            '1 day is equal to 0.00273973 years'               => [$d, new Year(0.00273973), 8],
        ];
    }
}

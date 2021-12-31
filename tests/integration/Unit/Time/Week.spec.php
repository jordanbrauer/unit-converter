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
 * Ensure that a week is infact, a week.
 *
 * @covers UnitConverter\Unit\Time\Week
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
class WeekSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $w = new Week(1);

        yield from [
            '1 week is equal to 604,800,000,000,000 nanoseconds' => [$w, new Nanosecond(604800000000000.0), 0],
            '1 week is equal to 604,800,000,000 microseconds'    => [$w, new Microsecond(604800000000.0), 0],
            '1 week is equal to 604,800,000 milliseconds'        => [$w, new Millisecond(604800000.0), 0],
            '1 week is equal to 604,800 seconds'                 => [$w, new Second(604800.0), 0],
            '1 week is equal to 10080 minutes'                   => [$w, new Minute(10080.0), 0],
            '1 week is equal to 168 hours'                       => [$w, new Hour(168.0), 0],
            '1 week is equal to 7 days'                          => [$w, new Day(7.0), 0],
            '1 week is equal to 1 week'                          => [$w, new Week(1.0), 0],
            '1 week is equal to 0.230137 month'                  => [$w, new Month(0.230137), 6],
            '1 week is equal to 0.0191781 years'                 => [$w, new Year(0.0191781), 7],
        ];
    }
}

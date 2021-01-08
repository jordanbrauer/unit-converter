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
 * Ensure that a hour is infact, a hour.
 *
 * @covers UnitConverter\Unit\Time\Hour
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
class HourSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $hr = new Hour(1);

        yield from [
            '1 hour is equal to 3,600,000,000,000 nanoseconds' => [$hr, new Nanosecond(3600000000000.0), 0],
            '1 hour is equal to 3,600,000,000 microseconds'    => [$hr, new Microsecond(3600000000.0), 0],
            '1 hour is equal to 3,600,000 milliseconds'        => [$hr, new Millisecond(3600000.0), 0],
            '1 hour is equal to 3,600 seconds'                 => [$hr, new Second(3600.0), 0],
            '1 hour is equal to 60 minutes'                    => [$hr, new Minute(60.0), 0],
            '1 hour is equal to 1 hours'                       => [$hr, new Hour(1.0), 0],
            '1 hour is equal to 0.0416667 days'                => [$hr, new Day(0.0416667), 7],
            '1 hour is equal to 0.00595238 weeks'              => [$hr, new Week(0.00595238), 8],
            '1 hour is equal to 0.00136986 months'             => [$hr, new Month(0.00136986), 8],
            '1 hour is equal to 0.000114155 years'             => [$hr, new Year(0.000114155), 9],
        ];
    }
}

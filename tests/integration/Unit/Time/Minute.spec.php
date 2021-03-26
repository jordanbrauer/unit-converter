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
 * Ensure that a minute is infact, a minute.
 *
 * @covers UnitConverter\Unit\Time\Minute
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
class MinuteSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $m = new Minute(1);

        yield from [
            '1 minute is equal to 60,000,000,000 nanoseconds' => [$m, new Nanosecond(60000000000.0), 0],
            '1 minute is equal to 60,000,000 microseconds'    => [$m, new Microsecond(60000000.0), 0],
            '1 minute is equal to 60,000 milliseconds'        => [$m, new Millisecond(60000.0), 0],
            '1 minute is equal to 60 seconds'                 => [$m, new Second(60.0), 0],
            '1 minute is equal to 1 minute'                   => [$m, new Minute(1.0), 0],
            '1 minute is equal to 0.0166667 hours'            => [$m, new Hour(0.0166667), 7],
            '1 minute is equal to 0.000694444 days'           => [$m, new Day(0.000694444), 9],
            '1 minute is equal to 0.000099206 weeks'          => [$m, new Week(0.000099206), 9],
            '1 minute is equal to 0.000022831 months'         => [$m, new Month(0.000022831), 9],
            '1 minute is equal to 0.00000190260 years'        => [$m, new Year(0.00000190260), 11],
        ];
    }
}

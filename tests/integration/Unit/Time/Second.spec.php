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
 * Ensure that a second is infact, a second.
 *
 * @covers UnitConverter\Unit\Time\Second
 * @uses UnitConverter\ConverterBuilder
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
class SecondSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatASecondIsAnSIUnit()
    {
        $result = (new Second())->isSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $s = new Second(1);

        yield from [
            '1 seconds is equal to 1,000,000,000 nanoseconds' => [$s, new Nanosecond(1000000000.0), 0],
            '1 seconds is equal to 1,000,000 microseconds'    => [$s, new Microsecond(1000000.0), 0],
            '1 seconds is equal to 1,000 milliseconds'        => [$s, new Millisecond(1000.0), 0],
            '1 seconds is equal to 1 seconds'                 => [$s, new Second(1.0), 0],
            '1 seconds is equal to 0.0166667 minutes'         => [$s, new Minute(0.0166667), 7],
            '1 seconds is equal to 0.000277778 hours'         => [$s, new Hour(0.000277778), 9],
            '1 seconds is equal to 0.000011574 days'          => [$s, new Day(0.000011574), 9],
            '1 seconds is equal to 0.0000016534 weeks'        => [$s, new Week(0.0000016534), 10],
            '1 seconds is equal to 0.00000038052 month'       => [$s, new Month(0.00000038052), 11],
            '1 seconds is equal to 0.00000003171 years'       => [$s, new Year(0.00000003171), 11],
        ];
    }
}

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
 * Ensure that a nanosecond is infact, a nanosecond.
 *
 * @covers UnitConverter\Unit\Time\Nanosecond
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
class NanosecondSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatANanosecondIsASubmultipleSIUnit()
    {
        $result = (new Nanosecond())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $ns = new Nanosecond(1);

        yield from [
            '1 nanoseconds is equal to 1 nanoseconds'                => [$ns, new Nanosecond(1.0), 0],
            '1 nanoseconds is equal to 0.001 microseconds'           => [$ns, new Microsecond(0.001), 3],
            '1 nanoseconds is equal to 0.000001 milliseconds'        => [$ns, new Millisecond(0.000001), 6],
            '1 nanoseconds is equal to 0.000000001 seconds'          => [$ns, new Second(0.000000001), 9],
            '1 nanoseconds is equal to 0.000000000016667 minutes'    => [$ns, new Minute(0.000000000016667), 15],
            '1 nanoseconds is equal to 0.00000000000027778 hours'    => [$ns, new Hour(0.00000000000027778), 17],
            '1 nanoseconds is equal to 0.000000000000011574 days'    => [$ns, new Day(0.000000000000011574), 18],
            '1 nanoseconds is equal to 0.0000000000000016534 weeks'  => [$ns, new Week(0.0000000000000016534), 19],
            '1 nanoseconds is equal to 0.00000000000000038052 month' => [$ns, new Month(0.00000000000000038052), 20],
            '1 nanoseconds is equal to 0.00000000000000003171 years' => [$ns, new Year(0.00000000000000003171), 20],
        ];
    }
}

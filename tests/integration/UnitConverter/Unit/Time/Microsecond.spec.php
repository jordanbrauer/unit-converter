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
use UnitConverter\Unit\Time\Microsecond;
use UnitConverter\Unit\Time\Second;
use UnitConverter\UnitConverter;

/**
 * Ensure that a microsecond is infact, a microsecond.
 *
 * @covers UnitConverter\Unit\Time\Microsecond
 * @uses UnitConverter\Unit\Time\Second
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class MicrosecondSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Second(),
                new Microsecond(),
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
    public function assert1MicrosecondIs0decimal000001Seconds()
    {
        $expected = 0.000001;
        $actual = $this->converter
            ->convert(1, 6)
            ->from("us")
            ->to("s");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assertThatAMicrosecondIsASubmultipleSIUnit()
    {
        $result = (new Microsecond())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertInternalType("bool", $result);
    }
}

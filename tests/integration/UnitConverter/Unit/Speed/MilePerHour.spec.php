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

namespace UnitConverter\Tests\Integration\Unit\Speed;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Speed\MetrePerSecond;
use UnitConverter\Unit\Speed\MilePerHour;
use UnitConverter\UnitConverter;

/**
 * Ensure that a mile per hour is infact, a mile per hour.
 *
 * @covers UnitConverter\Unit\Speed\MilePerHour
 * @uses UnitConverter\Unit\Speed\MetrePerSecond
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class MilePerHourSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new MetrePerSecond(),
                new MilePerHour(),
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
    public function assert1MilePerHourIs0decimal44704MetresPerSecond()
    {
        $expected = 0.44704;
        $actual = $this->converter
            ->convert(1, 5)
            ->from("miph")
            ->to("mps");

        $this->assertEquals($expected, $actual);
    }
}

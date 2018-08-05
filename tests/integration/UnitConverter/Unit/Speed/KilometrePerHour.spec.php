<?php declare(strict_types = 1);

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
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Speed\MetrePerSecond;
use UnitConverter\Unit\Speed\KilometrePerHour;

/**
 * Ensure that a kilometre per hour is infact, a kilometre per hour.
 *
 * @covers UnitConverter\Unit\Speed\KilometrePerHour
 * @uses UnitConverter\Unit\Speed\MetrePerSecond
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class KilometrePerHourSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new MetrePerSecond,
                new KilometrePerHour,
            )),
            new SimpleCalculator
        );
    }

    protected function tearDown ()
    {
        unset($this->converter);
    }

    /**
     * @test
     */
    public function assert1KilometrePerHourIs0decimal277778MetresPerSecond ()
    {
        $expected = 0.277778;
        $actual = $this->converter
            ->convert(1, 6)
            ->from("kmph")
            ->to("mps")
            ;

        $this->assertEquals($expected, $actual);
    }
}

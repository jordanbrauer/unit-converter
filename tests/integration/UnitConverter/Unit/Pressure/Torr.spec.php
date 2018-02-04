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

namespace UnitConverter\Tests\Integration\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Pressure\Pascal;
use UnitConverter\Unit\Pressure\Torr;

/**
 * Test that a Torr is indeed a Torr.
 *
 * @covers UnitConverter\Unit\Pressure\Torr
 * @uses UnitConverter\Unit\Pressure\Pascal
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class TorrSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Pascal,
                new Torr,
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
    public function assert1TorrIs133decimal322Pascal ()
    {
        $expected = 133.322;
        $actual = $this->converter
            ->convert(1, 3)
            ->from("Torr")
            ->to("Pa")
            ;

        $this->assertEquals($expected, $actual);
    }
}

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
use UnitConverter\Unit\Pressure\Kilopascal;

/**
 * Test that a kilopascal is indeed a kilopascal.
 *
 * @covers UnitConverter\Unit\Pressure\Kilopascal
 * @uses UnitConverter\Unit\Pressure\Pascal
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class KilopascalSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Pascal,
                new Kilopascal,
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
    public function assert1KilopascalIs1000Pascal ()
    {
        $expected = 1000;
        $actual = $this->converter
            ->convert(1)
            ->from("kPa")
            ->to("Pa")
            ;

        $this->assertEquals($expected, $actual);
    }
}

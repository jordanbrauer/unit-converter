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

namespace UnitConverter\Tests\Integration\Unit\Mass;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Mass\Kilogram;
use UnitConverter\Unit\Mass\Newton;

/**
 * Ensure that a newton is infact, a newton.
 *
 * @covers UnitConverter\Unit\Mass\Newton
 * @uses UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class NewtonSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Kilogram,
                new Newton,
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
    public function assert1NewtonIs9decimal80665002863885Kilograms ()
    {
        $expected = 9.80665002863885;
        $actual = $this->converter
            ->convert(1, 14)
            ->from("N")
            ->to("kg")
            ;

        $this->assertEquals($expected, $actual);
    }
}

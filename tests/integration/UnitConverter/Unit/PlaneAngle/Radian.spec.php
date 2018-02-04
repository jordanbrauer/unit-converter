<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Integration\Unit\PlaneAngle;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\PlaneAngle\Degree;
use UnitConverter\Unit\PlaneAngle\Radian;

/**
 * Ensure that a radian is infact, a radian.
 *
 * @covers UnitConverter\Unit\PlaneAngle\Radian
 * @uses UnitConverter\Unit\PlaneAngle\Degree
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class RadianSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Degree,
                new Radian,
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
    public function assert1RadianIs57decimal2958Degrees ()
    {
        $expected = 57.2958;
        $actual = $this->converter
            ->convert(1, 4)
            ->from("rad")
            ->to("deg")
            ;

        $this->assertEquals($expected, $actual);
    }
}

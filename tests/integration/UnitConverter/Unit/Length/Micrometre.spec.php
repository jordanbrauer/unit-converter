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

namespace UnitConverter\Tests\Integration\Unit\Length;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\Length\Micrometre;
use UnitConverter\UnitConverter;

/**
 * Ensure that a micrometre is infact, a micrometre.
 *
 * @covers UnitConverter\Unit\Length\Micrometre
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class MicrometreSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Metre(),
                new Micrometre(),
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
    public function assert1MicrometreIs0decimal000001Metres()
    {
        $expected = 0.000001;
        $actual = $this->converter
            ->convert(1, 6)
            ->from("um")
            ->to("m");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assertThatAMicrometreIsASubmultipleSIUnit()
    {
        $result = (new Micrometre())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertInternalType("bool", $result);
    }
}

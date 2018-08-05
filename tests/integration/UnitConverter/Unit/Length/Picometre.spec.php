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
use UnitConverter\Unit\Length\Picometre;
use UnitConverter\UnitConverter;

/**
 * Ensure that a picometre is infact, a picometre.
 *
 * @covers UnitConverter\Unit\Length\Picometre
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class PicometreSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Metre(),
                new Picometre(),
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
    public function assert1PicometreIs0decimal000000000001Metres()
    {
        $expected = 0.000000000001;
        $actual = $this->converter
            ->convert(1, 12)
            ->from("pm")
            ->to("m");

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function assertThatAPicometreIsASubmultipleSIUnit()
    {
        $result = (new Picometre())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertInternalType("bool", $result);
    }
}

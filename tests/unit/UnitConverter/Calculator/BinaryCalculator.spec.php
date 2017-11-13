<?php

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types = 1);

namespace UnitConverter\Tests\Unit\Calculator;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\BinaryCalculator;


/**
 * @coversDefaultClass UnitConverter\BinaryCalculator
 */
class BinaryCalculatorSpec extends TestCase
{
    protected function setUp()
    {
        $this->calculator = new BinaryCalculator;
    }

    protected function tearDown()
    {
        unset($this->calculator);
    }

    /**
     * @test
     * @covers ::add
     */
    public function assertAddingTwoNumbersWorksAsExpected ()
    {
        $expected = 5;
        $actual = $this->calculator->add("2.5", "2.5");

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::sub
     */
    public function assertSubtractingTwoNumbersWorksAsExpected ()
    {
        $expected = 2.5;
        $actual = $this->calculator->sub("5", "2.5");

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::mul
     */
    public function assertMultiplyMethodProperlyMultipliesTwoNumbers ()
    {
        $expected = 4;
        $actual = $this->calculator->mul("2", "2");

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::div
     */
    public function assertDivideMethodProperlyDividesTwoNumbers ()
    {
        $expected = 2;
        $actual = $this->calculator->div("4", "2");

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::mod
     */
    public function assertModulusMethodProperlyReturnsTheRemainderOfDivision ()
    {
        $expected = 1;
        $actual = $this->calculator->mod("5", "2");

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::pow
     */
    public function assertPowerMethodRaisesBaseNumberToPowerExponent ()
    {
        $expected = 100;
        $actual = $this->calculator->pow("10", "2");

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("string", $actual);
    }
}

<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Unit\Calculator;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\BinaryCalculator;

/**
 * @coversDefaultClass UnitConverter\Calculator\BinaryCalculator
 * @uses UnitConverter\Calculator\BinaryCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 */
class BinaryCalculatorSpec extends TestCase
{
    protected function setUp()
    {
        $this->calculator = new BinaryCalculator();
    }

    protected function tearDown()
    {
        unset($this->calculator);
    }

    /**
     * @test
     * @covers ::add
     */
    public function assertAddingTwoNumbersWorksAsExpected()
    {
        $expected = "5";
        $actual = $this->calculator->add("2.5", "2.5");

        $this->assertEquals($expected, $actual);
        // $this->assertSame($expected, $actual); # TODO: figure rounding issues – #54
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::div
     */
    public function assertDivideMethodProperlyDividesTwoNumbers()
    {
        $expected = "2";
        $actual = $this->calculator->div("4", "2");

        $this->assertEquals($expected, $actual);
        // $this->assertSame($expected, $actual); # TODO: figure rounding issues – #54
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::mod
     */
    public function assertModulusMethodProperlyReturnsTheRemainderOfDivision()
    {
        $expected = "1.0000";
        $actual = $this->calculator->mod("5", "2");

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::mul
     */
    public function assertMultiplyMethodProperlyMultipliesTwoNumbers()
    {
        $expected = "4.0000";
        $actual = $this->calculator->mul("2", "2");

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::pow
     */
    public function assertPowerMethodRaisesBaseNumberToPowerExponent()
    {
        $expected = "100.0000";
        $actual = $this->calculator->pow("10", "2");

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::round
     * @return void
     */
    public function assertRoundingANumberWorksAsExpected()
    {
        $expected = "2.5";
        $actual = $this->calculator->round("2.54", 1);
        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::sub
     */
    public function assertSubtractingTwoNumbersWorksAsExpected()
    {
        $expected = "2.5";
        $actual = $this->calculator->sub("5", "2.5");

        $this->assertEquals($expected, $actual);
        // $this->assertSame($expected, $actual); # TODO: figure rounding issues – #54
        $this->assertInternalType("string", $actual);
    }
}

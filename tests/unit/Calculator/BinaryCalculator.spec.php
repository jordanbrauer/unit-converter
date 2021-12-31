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
use TypeError;
use UnitConverter\Calculator\BinaryCalculator;

/**
 * @coversDefaultClass UnitConverter\Calculator\BinaryCalculator
 * @uses UnitConverter\Calculator\BinaryCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 */
class BinaryCalculatorSpec extends TestCase
{
    protected function setUp(): void
    {
        $this->calculator = new BinaryCalculator();
    }

    protected function tearDown(): void
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
        $this->assertIsString($actual);
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
        $this->assertIsString($actual);
    }

    /**
     * @test
     * @covers ::add
     */
    public function assertErrorIsThrownForInvalidAdditionTypeInput()
    {
        $this->expectException(TypeError::class);
        $this->calculator->add('asdf', 'asdf');
    }

    /**
     * @test
     * @covers ::div
     */
    public function assertErrorIsThrownForInvalidDivisionTypeInput()
    {
        $this->expectException(TypeError::class);
        $this->calculator->div('asdf', 'asdf');
    }

    /**
     * @test
     * @covers ::mod
     */
    public function assertErrorIsThrownForInvalidModulusTypeInput()
    {
        $this->expectException(TypeError::class);
        $this->calculator->mod('asdf', 'asdf');
    }

    /**
     * @test
     * @covers ::mul
     */
    public function assertErrorIsThrownForInvalidMultiplicationTypeInput()
    {
        $this->expectException(TypeError::class);
        $this->calculator->mul('asdf', 'asdf');
    }

    /**
     * @test
     * @covers ::pow
     */
    public function assertErrorIsThrownForInvalidPowerTypeInput()
    {
        $this->expectException(TypeError::class);
        $this->calculator->pow('asdf', 'asdf');
    }

    /**
     * @test
     * @covers ::round
     */
    public function assertErrorIsThrownForInvalidRoundingTypeInput()
    {
        $this->expectException(TypeError::class);
        $this->calculator->round('asdf.34');
    }

    /**
     * @test
     * @covers ::sub
     */
    public function assertErrorIsThrownForInvalidSubtractionTypeInput()
    {
        $this->expectException(TypeError::class);
        $this->calculator->sub('asdf', 'asdf');
    }

    /**
     * @test
     * @covers ::mod
     */
    public function assertModulusMethodProperlyReturnsTheRemainderOfDivision()
    {
        $this->calculator->setPrecision(0);

        $expected = "1";
        $actual = $this->calculator->mod("5", "2");

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
        $this->assertIsString($actual);
    }

    /**
     * @test
     * @covers ::mul
     */
    public function assertMultiplyMethodProperlyMultipliesTwoNumbers()
    {
        $this->calculator->setPrecision(0);

        $expected = "4";
        $actual = $this->calculator->mul("2", "2");

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
        $this->assertIsString($actual);
    }

    /**
     * @test
     * @covers ::pow
     */
    public function assertPowerMethodRaisesBaseNumberToPowerExponent()
    {
        $this->calculator->setPrecision(0);

        $expected = "100";
        $actual = $this->calculator->pow("10", "2");

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
        $this->assertIsString($actual);
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
        $this->assertIsString($actual);
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
        $this->assertIsString($actual);
    }
}

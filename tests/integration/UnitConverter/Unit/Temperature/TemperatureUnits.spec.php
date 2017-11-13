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

declare(strict_types = 1);

namespace UnitConverter\Tests\Integration\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Temperature\Celsius;
use UnitConverter\Unit\Temperature\Fahrenheit;
use UnitConverter\Unit\Temperature\Kelvin;

/**
 * Test the default temperature units for conversion accuracy.
 *
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class TemperatureUnitsSpec extends TestCase
{
  protected function setUp ()
  {
    $this->converter = new UnitConverter(
      new UnitRegistry(array(
        new Celsius,
        new Fahrenheit,
        new Kelvin,
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
   * @coversNothing
   */
  public function assertZeroCelsiusEqualsTwoHundredSeventyThreeDecimalFifteen ()
  {
    $expected = 273.15;
    $actual = $this->converter
      ->convert(0)
      ->from("c")
      ->to("k")
      ;

    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   * @coversNothing
   */
  public function assertZeroFahrenheitEqualsTwoHundredFiftyFiveDecimalThreeHundredSeventyTwo ()
  {
    $expected = 255.37;
    $actual = $this->converter
      ->convert(0)
      ->from("f")
      ->to("k")
      ;

    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   * @coversNothing
   */
  public function assertZeroCelsiusEqualsThirtyTwoFahrenheit ()
  {
    $expected = 32;
    $actual = $this->converter
      ->convert(0)
      ->from("c")
      ->to("f")
      ;

    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   * @coversNothing
   */
  public function assertZeroFahrenheitEqualsNegativeSeventeenDecimalSevenThousandSevenHundredSeventyEightCelsius ()
  {
    $expected = -17.7778;
    $actual = $this->converter
      ->convert(0, 4)
      ->from("f")
      ->to("c")
      ;

    $this->assertEquals($expected, $actual);
  }
}

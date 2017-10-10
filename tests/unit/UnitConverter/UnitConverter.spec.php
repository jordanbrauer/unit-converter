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

namespace UnitConverter\Tests\Unit;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\{
  Centimeter,
  Inch
};

/**
 * @coversDefaultClass UnitConverter\UnitConverter
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class UnitConverterSpec extends TestCase
{
  protected function setUp ()
  {
    $this->converter = new UnitConverter(
      new UnitRegistry(array(
        new Centimeter,
        new Inch,
      ))
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
  public function assertConversionAttemptsWithoutARegistryThrowsOutOfBoundsException ()
  {
    $this->expectException("UnitConverter\\Exception\\MissingUnitRegistryException");
    $converter = new UnitConverter;
    $converter->convert(1)->from("in")->to("cm");
  }

  /**
   * @test
   * @covers ::convert
   * @covers ::from
   * @covers ::to
   * @covers ::calculate
   */
  public function assertCalculateMethodReturnsCorrectCalculation ()
  {
    $expected = 2.54; # = (1 * 0.0254) / 0.01
    $actual = $this->converter
      ->convert(1)
      ->from("in")
      ->to("cm")
      ;

    $this->assertEquals($expected, $actual);
    $this->assertInternalType("float", $actual);
  }

  /**
   * @test
   * @coversNothing
   */
  public function assertConversionThrowsErrorExceptionAtUnknownUnits ()
  {
    $this->expectException("UnitConverter\\Exception\\UnknownUnitOfMeasureException");
    $this->converter
      ->convert(1)
      ->from("yd") # any unregistered unit
      ->to("in")
      ;
  }
}

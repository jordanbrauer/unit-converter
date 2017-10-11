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

namespace UnitConverter\Tests\Integration\Unit\Volume;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Volume\{
  Litre,
  Mililitre,
  Gallon,
  Pint
};

/**
 * Test the default volume units for conversion accuracy.
 *
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class VolumeUnitsSpec extends TestCase
{
  protected function setUp ()
  {
    $this->converter = new UnitConverter(
      new UnitRegistry(array(
        new Litre,
        new Mililitre,
        new Gallon,
        new Pint,
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
  public function assert ()
  {
    $expected = 4.73176;
    $actual = $this->converter
      ->convert(10)
      ->from("pt")
      ->to("l")
      ;

    $this->assertEquals(round($expected, 5), round($actual, 5));
  }
}

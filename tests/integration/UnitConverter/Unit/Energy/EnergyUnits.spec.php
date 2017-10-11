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

namespace UnitConverter\Tests\Integration\Unit\Energy;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Energy\{
  Joule,
  Calorie
};

/**
 * Test the default volume units for conversion accuracy.
 *
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class EnergyUnitsSpec extends TestCase
{
  protected function setUp ()
  {
    $this->converter = new UnitConverter(
      new UnitRegistry(array(
        new Joule,
        new Calorie,
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
    $expected = 50208;
    $actual = $this->converter
      ->convert(12)
      ->from("cal")
      ->to("j")
      ;

    $this->assertEquals(round($expected, 3), round($actual, 3));
  }
}

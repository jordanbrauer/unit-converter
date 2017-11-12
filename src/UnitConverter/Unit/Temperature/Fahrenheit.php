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

namespace UnitConverter\Unit\Temperature;

use Exception;
use UnitConverter\Unit\UnitInterface;

/**
 * Fahrenheit unit data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Fahrenheit extends TemperatureUnit
{
  protected function configure () : void
  {
    $this
      ->setName("fahrenheit")

      ->setSymbol("f")
      ;
  }

  protected function calculate (float $value, UnitInterface $to) : ?float
  {
    $val = $value ?? $this->getBase()->getUnits();

    # 0 °K = 255.372 °F
    switch ($to->getSymbol()) {
      case 'c': # °C = (°F - 32) × (5 ÷ 9)
        return ($val - 32) * (5 / 9);
        break;

      case 'k': # °K = (°F + 459.67) × (5 ÷ 9)
        return (($val + 459.67) * 5 / 9);
        break;

      case 'f': # °F = °F
        return $val;
        break;

      default:
        throw new Exception("Unknown conversion formula for {$to->getSymbol()}");
    }
  }
}

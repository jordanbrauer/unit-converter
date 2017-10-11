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

use UnitConverter\Measure;
use UnitConverter\Unit\{ AbstractUnit, UnitInterface };

/**
 * Celsius unit data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Celsius extends TemperatureUnit
{
  protected function configure () : void
  {
    $this
      ->setName("celsius")

      ->setSymbol("c")
      ;
  }

  protected function calculate (float $value, UnitInterface $to) : ?float
  {
    $val = $value ?? $this->getBasetUnits();

    # 0 °K = 273.15 °C
    switch ($to->getSymbol()) {
      case 'f': # °F = (°C × (9 ÷ 5)) + 32
        return ($val * (9 / 5)) + 32;
        break;

      case 'k': # °K = °C + 273.15
        return ($val + 273.15);
        break;

      case 'c': # °C = °C
        return $val;
        break;
        
      default:
        throw new \Exception("Unknown conversion formula for {$to->getSymbol()}");
    }
  }
}

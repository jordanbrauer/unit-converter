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

namespace UnitConverter\Unit\Area;

use UnitConverter\Measure;
use UnitConverter\Unit\{ AbstractUnit, UnitInterface };

/**
 * Square centimeter data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class SquareCentimeter extends AreaUnit
{
  protected function configure () : void
  {
    $this
      ->setName("square centimeter")

      ->setSymbol("cm2")

      ->setUnits(0.0001)
      ;
  }
}

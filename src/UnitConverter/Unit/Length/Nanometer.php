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

namespace UnitConverter\Unit\Length;

/**
 * Nanometer data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Nanometer extends LengthUnit
{
  protected function configure () : void
  {
    $this
      ->setName("nanometer")

      ->setSymbol("nm")

      # 1.0E-9
      ->setUnits(0.000000001)
      ;
  }
}

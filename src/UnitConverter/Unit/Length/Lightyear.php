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
 * Lightyear data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Lightyear extends LengthUnit
{
  protected function configure () : void
  {
    $this
      ->setName("lightyear")

      ->setSymbol("ly")

      # Metric (SI) Units = 9.4607 × 1015 m
      # – OR – 9.4607 Pm
      ->setUnits(9460730472580800)
      ;
  }
}

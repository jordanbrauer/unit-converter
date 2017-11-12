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

namespace UnitConverter\Unit\Mass;

/**
 * MetricTonne data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class MetricTonne extends MassUnit
{
  protected function configure () : void
  {
    $this
      ->setName("metric tonne")

      ->setSymbol("t")

      ->setUnits(1000)
      ;
  }
}

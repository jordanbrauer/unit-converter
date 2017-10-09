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

use UnitConverter\Measure;
use UnitConverter\Unit\{ AbstractUnit, UnitInterface };

/**
 * Parsec data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Parsec extends LengthUnit
{
  protected $name = "parsec";

  protected $symbol = "pc";

  # Metric (SI) Units = 3.0857×1016 m
  # – OR – ~31 petametres
  protected $units = 30856775814913672.789139379577965; # 3.08567758149E+16
}

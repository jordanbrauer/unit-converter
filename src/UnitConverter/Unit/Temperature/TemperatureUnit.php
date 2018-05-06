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

declare (strict_types = 1);

namespace UnitConverter\Unit\Temperature;

use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;

/**
 * Temperature base data class. Any new temperature units should
 * extend this class and implement their name, symbol and units;
 * overriding the $unitOf and $base properties only if necessary.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
abstract class TemperatureUnit extends AbstractUnit
{
    protected $unitOf = Measure::TEMPERATURE;

    protected $base = Kelvin::class;
}

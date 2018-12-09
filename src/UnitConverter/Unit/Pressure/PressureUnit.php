<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Unit\Pressure;

use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;

/**
 * Pressure base data class. Any new pressure units should
 * extend this class and implement their name, symbol and units;
 * overriding the $unitOf and $base properties only if necessary.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
abstract class PressureUnit extends AbstractUnit
{
    protected $base = Pascal::class;

    protected $unitOf = Measure::PRESSURE;
}

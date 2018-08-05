<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Unit\Area;

use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;

/**
 * Area unit base data class. Any new area units should
 * extend this class and implement their name, symbol and units;
 * overriding the $unitOf and $base properties only if necessary.
 *
 * @version 1.0.1
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
abstract class AreaUnit extends AbstractUnit
{
    protected $unitOf = Measure::AREA;

    protected $base = SquareMetre::class;
}

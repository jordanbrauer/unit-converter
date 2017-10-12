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

namespace UnitConverter\Unit\Time;

use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;

/**
 * Time base class, new time classes should be extending this class
 * implenting their name, symbol and units
 * Only override $unitOf and $base properties when necessary
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Teun Willems
 */
abstract class TimeUnit extends AbstractUnit
{
    protected $unitOf = Measure::TIME;

    protected $base = Second::class;
}
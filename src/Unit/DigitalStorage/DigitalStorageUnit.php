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

namespace UnitConverter\Unit\DigitalStorage;

use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;

/**
 * Digital Storage unit base data class. Any new digital storage units should
 * extend this class and implement their name, symbol and units;
 * overriding the $unitOf and $base properties only if necessary.
 *
 * @version 1.0.0
 * @since 0.8.4
 * @author Laurent Clouet <https://github.com/laurent35240>
 */
abstract class DigitalStorageUnit extends AbstractUnit
{
    protected $base = Bit::class;

    protected $unitOf = Measure::DIGITAL_STORAGE;
}

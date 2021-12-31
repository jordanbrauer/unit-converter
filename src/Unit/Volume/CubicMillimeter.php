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

namespace UnitConverter\Unit\Volume;

/**
 * Cubic millimeter unit data class.
 *
 * @version 2.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class CubicMillimetre extends VolumeUnit
{
    protected function configure(): void
    {
        $this
            ->setName("cubic millimeter")

            ->setSymbol("mm3")

            ->setScientificSymbol("mm³")

            ->setUnits(0.000001);
    }
}

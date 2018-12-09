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
 * Cubic metre unit data class.
 *
 * @version 2.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class CubicMetre extends VolumeUnit
{
    protected function configure(): void
    {
        $this
            ->setName("cubic metre")

            ->setSymbol("m3")

            ->setScientificSymbol("m³")

            ->setUnits(1000);
    }
}

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

namespace UnitConverter\Unit\Volume;

/**
 * Cubic metre unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class CubicMetre extends VolumeUnit
{
    protected function configure (): void
    {
        $this
            ->setName("cubic metre")

            ->setSymbol("m3")

            ->setUnits(1000)
            ;
    }
}

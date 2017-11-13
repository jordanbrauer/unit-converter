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
 * Gallon unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Gallon extends VolumeUnit
{
    protected function configure (): void
    {
        $this
            ->setName("gallon")

            ->setSymbol("gal")

            ->setUnits(3.78541)
            ;
    }
}

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

namespace UnitConverter\Unit\Length;

/**
 * Micrometre data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Micrometre extends LengthUnit
{
    protected function configure (): void
    {
        $this
            ->setName("micrometre")

            ->setSymbol("µm")

            # 1.0E-6
            ->setUnits(0.000001)
            ;
    }
}

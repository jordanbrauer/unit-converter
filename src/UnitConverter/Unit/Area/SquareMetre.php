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

namespace UnitConverter\Unit\Area;

/**
 * Square metre data class. All area units will use this
 * class as the $base property.
 *
 * @version 2.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class SquareMetre extends AreaUnit
{
    protected function configure (): void
    {
        $this
            ->setName("square metre")

            ->setSymbol("m2")

            ->setScientificSymbol("m²")

            ->setUnits(1)
            ;
    }
}

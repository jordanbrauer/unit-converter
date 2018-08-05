<?php

declare(strict_types = 1);

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

/**
 * Square centimetre data class.
 *
 * @version 2.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class SquareCentimetre extends AreaUnit
{
    protected function configure(): void
    {
        $this
            ->setName("square centimetre")

            ->setSymbol("cm2")

            ->setScientificSymbol("cm²")

            ->setUnits(0.0001);
    }
}

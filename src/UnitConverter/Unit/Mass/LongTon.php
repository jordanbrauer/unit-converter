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

namespace UnitConverter\Unit\Mass;

/**
 * Long ton (U.K.) data class. Also known as 'weight ton', or 'gross ton'.
 *
 * @version 2.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class LongTon extends MassUnit
{
    protected function configure(): void
    {
        $this
            ->setName("long ton")

            ->setSymbol("ton")

            ->setUnits(1016.047);
    }
}

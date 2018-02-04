<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Unit\Time;

/**
 * Nanosecond unit data class.
 *
 * @version 1.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class Nanosecond extends TimeUnit
{
    protected function configure (): void
    {
        $this
            ->setName("nanosecond")

            ->setSymbol("ns")

            ->setUnits(0.000000001)
            ;
    }
}

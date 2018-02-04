<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Unit\Time;

/**
 * Millisecond unit data class.
 *
 * @version 1.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class Millisecond extends TimeUnit
{
    protected function configure (): void
    {
        $this
            ->setName("millisecond")

            ->setSymbol("ms")

            ->setUnits(0.001)
            ;
    }
}

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

namespace UnitConverter\Unit\Mass;

/**
 * Short ton data class. Also known as 'net ton'.
 *
 * @version 2.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class ShortTon extends MassUnit
{
    protected function configure (): void
    {
        $this
            ->setName("short ton")

            ->setSymbol("ton")

            ->setUnits(907.1847)
            ;
    }
}

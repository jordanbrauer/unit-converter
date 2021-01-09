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

namespace UnitConverter\Unit\Time;

use UnitConverter\Unit\Family\SiSubmultipleUnit;

/**
 * Microsecond unit data class.
 *
 * @version 2.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class Microsecond extends TimeUnit implements SiSubmultipleUnit
{
    protected $siUnit = true;

    protected function configure(): void
    {
        $this
            ->setName("microsecond")

            ->setSymbol("us")

            ->setScientificSymbol("µs")

            ->setUnits(0.000001);
    }
}

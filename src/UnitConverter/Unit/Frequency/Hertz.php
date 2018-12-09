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

namespace UnitConverter\Unit\Frequency;

/**
 * Hertz data class. All units of Frequency are based off of Hertz.
 */
class Hertz extends FrequencyUnit
{
    protected function configure(): void
    {
        $this
            ->setName("hertz")
            ->setSymbol("Hz")
            ->setUnits(1);
    }
}

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

namespace UnitConverter\Unit\Energy;

/**
 * Watt hour unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class WattHour extends EnergyUnit
{
    protected function configure(): void
    {
        $this
            ->setName("watt hour")

            ->setSymbol("Wh")

            ->setScientificSymbol("W · h")

            ->setUnits(3600);
    }
}

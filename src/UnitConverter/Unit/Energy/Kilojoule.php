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
 * Kilojoule unit data class.
 *
 * @version 1.0.0
 * @since 0.3.9
 * @author Andrew Boerema <1569403+andrewboerema@users.noreply.github.com>
 */
class Kilojoule extends EnergyUnit
{
    protected function configure(): void
    {
        $this
            ->setName("kilojoule")

            ->setSymbol("kJ")

            ->setUnits(1000);
    }
}

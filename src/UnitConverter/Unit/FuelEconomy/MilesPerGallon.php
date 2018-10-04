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

namespace UnitConverter\Unit\FuelEconomy;

/**
 * MilesPerGallon (US) unit data class.
 *
 * @version 2.0.0
 * @since 0.0.1
 */
class MilesPerGallon extends FuelEconomyUnit
{
    protected function configure(): void
    {
        $this
            ->setName("miles per gallon")

            ->setSymbol("mpg")

            ->setUnits(2.35215);
    }
}

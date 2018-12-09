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

namespace UnitConverter\Unit\FuelEconomy;

/**
 * KilometrePerLitre unit data class.
 *
 * @version 1.0.1
 * @since 0.9.0
 */
class KilometrePerLitre extends FuelEconomyUnit
{
    protected function configure(): void
    {
        $this
            ->setName("kilometre per litre")

            ->setSymbol("km/l")

            ->setUnits(1);
    }
}

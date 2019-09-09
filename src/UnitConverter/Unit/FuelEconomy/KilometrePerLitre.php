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

use UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToLitrePer100Kilometres;
use UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToMilesPerGallonImperial;
use UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToMilesPerGallonUS;
use UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToMilesPerLitre;
use UnitConverter\Calculator\Formula\NullFormula;

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

            ->addFormulae([
                'L/100km' => ToLitrePer100Kilometres::class,
                'mpg' => ToMilesPerGallonUS::class,
                'mpg uk' => ToMilesPerGallonImperial::class,
                'mi/l' => ToMilesPerLitre::class,
                'km/l' => NullFormula::class,
            ]);
    }
}

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

namespace UnitConverter\Unit\Temperature;

use UnitConverter\Calculator\Formula\NullFormula;
use UnitConverter\Calculator\Formula\Temperature\Kelvin\ToCelsius;
use UnitConverter\Calculator\Formula\Temperature\Kelvin\ToFahrenheit;
use UnitConverter\Unit\Family\SiUnit;

/**
 * Kelvin unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class Kelvin extends TemperatureUnit implements SiUnit
{
    protected function configure(): void
    {
        $this
            ->setName("kelvin")

            ->setSymbol("K")

            ->setScientificSymbol("K")

            ->setUnits(1)

            ->addFormulae([
                'K' => NullFormula::class,
                'F' => ToFahrenheit::class,
                'C' => ToCelsius::class,
            ]); # 🐓 🍗 secret blend of herbs & spices?
    }
}

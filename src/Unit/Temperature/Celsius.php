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
use UnitConverter\Calculator\Formula\Temperature\Celsius\ToFahrenheit;
use UnitConverter\Calculator\Formula\Temperature\Celsius\ToKelvin;

/**
 * Celsius unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class Celsius extends TemperatureUnit
{
    protected function configure(): void
    {
        $this
            ->setName("celsius")

            ->setSymbol("C")

            ->setScientificSymbol("°C")

            ->addFormulae([
                'K' => ToKelvin::class,
                'F' => ToFahrenheit::class,
                'C' => NullFormula::class,
            ]); # 🐓 🍗 secret blend of herbs & spices?
    }
}

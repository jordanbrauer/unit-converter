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
use UnitConverter\Calculator\Formula\Temperature\Fahrenheit\ToCelsius;
use UnitConverter\Calculator\Formula\Temperature\Fahrenheit\ToKelvin;

/**
 * Fahrenheit unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class Fahrenheit extends TemperatureUnit
{
    protected function configure(): void
    {
        $this
            ->setName("fahrenheit")

            ->setSymbol("F")

            ->setScientificSymbol("°F")

            ->addFormulae([
                'K' => ToKelvin::class,
                'F' => NullFormula::class,
                'C' => ToCelsius::class,
            ]); # 🐓 🍗 secret blend of herbs & spices?
    }
}

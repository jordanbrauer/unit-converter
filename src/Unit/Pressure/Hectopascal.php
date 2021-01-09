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

namespace UnitConverter\Unit\Pressure;

/**
 * Kilopascal unit data class.
 *
 * @version 1.0.0
 * @since 0.8.5
 * @author Michal Podsednik
 */
class Hectopascal extends PressureUnit
{
    protected function configure(): void
    {
        $this
            ->setName("hectopascal")

            ->setSymbol("hPa")

            ->setScientificSymbol("hPa")

            ->setUnits(100);
    }
}

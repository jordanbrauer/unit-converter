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

namespace UnitConverter\Unit\Mass;

use UnitConverter\Calculator\Formula\Mass\Stone\ToMilligrams;

/**
 * Stone data class.
 *
 * @version 1.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class Stone extends MassUnit
{
    protected function configure(): void
    {
        $this
            ->setName("stone")

            ->setSymbol("st")

            ->setUnits(6.35029)

            ->addFormulae([
                'mg' => ToMilligrams::class
            ]);
    }
}

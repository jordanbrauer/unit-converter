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

use UnitConverter\Calculator\Formula\Mass\LongTon\ToGrams;
use UnitConverter\Calculator\Formula\Mass\LongTon\ToMilligrams;

/**
 * Long ton (U.K.) data class. Also known as 'weight ton', or 'gross ton'.
 *
 * @version 2.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class LongTon extends MassUnit
{
    protected function configure(): void
    {
        $this
            ->setName("long ton")

            ->setSymbol("w/t") # NOTE: A long ton is also referred to as "weight ton (W/T)"

            ->setUnits(1016.047)

            ->addFormulae([
                'g'  => ToGrams::class,
                'mg' => ToMilligrams::class,
            ]);
    }
}

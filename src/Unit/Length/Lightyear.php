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

namespace UnitConverter\Unit\Length;

use UnitConverter\Calculator\Formula\Length\Lightyear\ToCentimetres;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToDecimetres;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToFeet;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToHands;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToInches;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToKilometres;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToMicrometres;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToMiles;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToMillimetres;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToNanometres;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToPicometres;
use UnitConverter\Calculator\Formula\Length\Lightyear\ToYards;

/**
 * Lightyear data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class Lightyear extends LengthUnit
{
    protected function configure(): void
    {
        $this
            ->setName("lightyear")

            ->setSymbol("ly")

            # Metric (SI) Units = 9.4607 × 1015 m
            # – OR – 9.4607 Pm
            ->setUnits(9460730472580800)

            ->addFormulae([
                'cm' => ToCentimetres::class,
                'dm' => ToDecimetres::class,
                'ft' => ToFeet::class,
                'h'  => ToHands::class,
                'in' => ToInches::class,
                'km' => ToKilometres::class,
                'um' => ToMicrometres::class,
                'mi' => ToMiles::class,
                'mm' => ToMillimetres::class,
                'nm' => ToNanometres::class,
                'pm' => ToPicometres::class,
                'yd' => ToYards::class,
            ]);
    }
}

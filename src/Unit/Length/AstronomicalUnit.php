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

use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToCentimetres;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToDecimetres;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToFeet;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToHands;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToInches;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToKilometres;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToMicrometres;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToMiles;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToMillimetres;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToNanometres;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToPicometres;
use UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToYards;

/**
 * AstronomicalUnit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class AstronomicalUnit extends LengthUnit
{
    protected function configure(): void
    {
        $this
            ->setName("astronomical unit")

            ->setSymbol("au")

            ->setUnits(149597870700)

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

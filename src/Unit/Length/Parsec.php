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

use UnitConverter\Calculator\Formula\Length\Parsec\ToCentimetres;
use UnitConverter\Calculator\Formula\Length\Parsec\ToDecimetres;
use UnitConverter\Calculator\Formula\Length\Parsec\ToFeet;
use UnitConverter\Calculator\Formula\Length\Parsec\ToHands;
use UnitConverter\Calculator\Formula\Length\Parsec\ToInches;
use UnitConverter\Calculator\Formula\Length\Parsec\ToKilometres;
use UnitConverter\Calculator\Formula\Length\Parsec\ToMicrometres;
use UnitConverter\Calculator\Formula\Length\Parsec\ToMiles;
use UnitConverter\Calculator\Formula\Length\Parsec\ToMillimetres;
use UnitConverter\Calculator\Formula\Length\Parsec\ToNanometres;
use UnitConverter\Calculator\Formula\Length\Parsec\ToPicometres;
use UnitConverter\Calculator\Formula\Length\Parsec\ToYards;

/**
 * Parsec data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class Parsec extends LengthUnit
{
    protected function configure(): void
    {
        $this
            ->setName("parsec")

            ->setSymbol("pc")

            # Metric (SI) Units = 3.0857×1016 m
            # – OR – ~31 petametres
            # 3.08567758149E+16
            ->setUnits(30856775814913672.789139379577965)

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

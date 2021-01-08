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

use UnitConverter\Calculator\Formula\Length\Mile\ToMicrometres;
use UnitConverter\Calculator\Formula\Length\Mile\ToMillimetres;
use UnitConverter\Calculator\Formula\Length\Mile\ToNanometres;
use UnitConverter\Calculator\Formula\Length\Mile\ToPicometres;

/**
 * Mile data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class Mile extends LengthUnit
{
    protected function configure(): void
    {
        $this
            ->setName("mile")

            ->setSymbol("mi")

            ->setUnits(1609.344)

            ->addFormulae([
                'um' => ToMicrometres::class,
                'mm' => ToMillimetres::class,
                'nm' => ToNanometres::class,
                'pm' => ToPicometres::class,
            ]);
    }
}

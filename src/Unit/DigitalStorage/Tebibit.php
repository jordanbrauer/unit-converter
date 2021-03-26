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

namespace UnitConverter\Unit\DigitalStorage;

use UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToBits;
use UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToBytes;
use UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToGibibits;
use UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToKibibits;
use UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToKilobits;
use UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToKilobytes;
use UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToMebibits;
use UnitConverter\Calculator\Formula\DigitalStorage\Tebibit\ToMegabits;

/**
 * Tebibit unit data class
 *
 * @version 1.0.0
 * @since 0.8.4
 * @author Laurent Clouet <https://github.com/laurent35240>
 */
class Tebibit extends DigitalStorageUnit
{
    protected function configure(): void
    {
        $this
            ->setName("tebibit")

            ->setSymbol("Tib")

            ->setScientificSymbol("Tib")

            ->setUnits(1099511627776)

            ->addFormulae([
                'b'   => ToBits::class,
                'B'   => ToBytes::class,
                'Gb'  => ToGibibits::class,
                'Kib' => ToKibibits::class,
                'kb'  => ToKilobits::class,
                'kB'  => ToKilobytes::class,
                'Mib' => ToMebibits::class,
                'Mb'  => ToMegabits::class,
            ]);
    }
}

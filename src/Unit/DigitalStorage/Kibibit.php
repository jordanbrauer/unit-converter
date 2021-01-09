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

/**
 * Kibibit unit data class
 *
 * @version 1.0.0
 * @since 0.8.4
 * @author Laurent Clouet <https://github.com/laurent35240>
 */
class Kibibit extends DigitalStorageUnit
{
    protected function configure(): void
    {
        $this
            ->setName("kibibit")

            ->setSymbol("Kib")

            ->setScientificSymbol("Kib")

            ->setUnits(1024);
    }
}

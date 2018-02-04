<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Unit\Length;

/**
 * Millimetre data class.
 *
 * @version 2.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Millimetre extends LengthUnit
{
    protected function configure (): void
    {
        $this
            ->setName("millimetre")

            ->setSymbol("mm")

            ->setUnits(0.001)
            ;
    }
}

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

namespace UnitConverter\Unit\Pressure;

/**
 * Pound-force per square inch unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class PoundForcePerSquareInch extends PressureUnit
{
    protected function configure (): void
    {
        $this
            ->setName("pound-force per square inch")

            ->setSymbol("psi")

            ->setScientificSymbol("lbf/in²")

            ->setUnits(6894.76)
            ;
    }
}

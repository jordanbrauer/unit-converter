<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Unit\Time;

/**
 * Year unit data class.
 *
 * @version 2.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class Year extends TimeUnit
{
    protected function configure (): void
    {
        $this
            ->setName("year")

            ->setSymbol("y")

            ->setUnits(31536000)
            ;
    }

    /**
     * Determines if the given (or current, if non supplied) year is a leap year.
     *
     * @param integer $year The year being checked.
     * @return boolean
     */
    public static function isLeapYear (int $year = null): bool
    {
        $year = ($year ?? date('Y'));

        return (
            (0 == ($year % 4))
            && ((0 != ($year % 100)) XOR (0 == ($year % 400)))
        );
    }
}

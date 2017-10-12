<?php

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace UnitConverter\Unit\Time;

/**
 * Year unit data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Teun Willems
 */
class Year extends TimeUnit
{
    protected function configure(): void
    {
        $this
            ->setName("year")
            ->setSymbol("year")
            ->setUnits(31536000);
    }

    public static function isLeapYear($year = null)
    {
        if ($year == null) $year = date('Y');

        // Every 4 years is a leap year
        if ($year % 4 == 0) {
            // Exception when divisible by 100 but not 400
            if ($year % 100 == 0) {
                if ($year % 400 == 0) {
                    return true;
                }
                return false;
            }
            return true;
        }
        return false;
    }
}

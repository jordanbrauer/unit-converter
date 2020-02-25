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

namespace UnitConverter\Unit\Time;

/**
 * Month unit data class.
 *
 * @version 2.0.0
 * @since 0.3.9
 * @author Teun Willems
 */
class Month extends TimeUnit
{
    const HIGH_DAY_COUNT_MONTHS = [1, 3, 5, 7, 8, 10, 12];

    const LOW_DAY_COUNT_MONTHS = [2];

    const MID_DAY_COUNT_MONTHS = [4, 6, 9, 11];

    /**
     * Check if a month has a given number of days in it;s calendar.
     *
     * @param mixed $month The number of the month being checked.
     * @param integer $number The number of days to check against.
     * @return boolean
     */
    public static function hasNumberOfDays($month, int $number = 31): bool
    {
        switch ($number) {
            case 28:
            case 29:
                $listing = self::LOW_DAY_COUNT_MONTHS;

                break;
            case 30:
                $listing = self::MID_DAY_COUNT_MONTHS;

                break;
            case 31:
                $listing = self::HIGH_DAY_COUNT_MONTHS;

                break;
            default:
                $listing = []; // no months exist
        }

        return in_array($month, $listing);
    }

    protected function configure(): void
    {
        $this
            ->setName("month")

            ->setSymbol("mo")

            ->setUnits(2628000);
    }
}

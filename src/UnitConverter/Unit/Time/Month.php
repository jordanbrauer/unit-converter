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

declare(strict_types = 1);

namespace UnitConverter\Unit\Time;
use UnitConverter\Unit\UnitInterface;

/**
 * Month unit data class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Teun Willems
 */
class Month extends TimeUnit
{
    protected function configure () : void
    {
        $this
            ->setName("month")

            ->setSymbol("month")

            ->setUnits(2678400)
        ;
    }

    private function has31Days($month) {
        return is_numeric(array_search($month, [1, 3, 5, 7, 8, 10, 12]));
    }

    public function calculate(float $value, UnitInterface $to, $year = null): ?float
    {
        if ($year == null) $year = date('Y');

        if ($to->getSymbol() == 'day') {
            if ($value == 2) {
                return Year::isLeapYear($year) ? 29.0 : 28.0;
            }
            return $this->has31Days($value) ? 31.0 : 30.0;
        }
        throw new \Exception("Could not find unit to convert to");
    }
}

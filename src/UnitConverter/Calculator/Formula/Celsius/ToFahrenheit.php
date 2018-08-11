<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Calculator\Formula\Celsius;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert Celsius values to Fahrenheit.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class ToFahrenheit extends AbstractFormula
{
    const MAGIC_NUMBER = 32;

    protected $string = '°F = (°C × (9 ÷ 5)) + 32';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $divisor = $this->calculator->div(9, 5);

        return $this->calculator->round(
            $this->calculator->add(
                $this->calculator->mul($value, $divisor),
                self::MAGIC_NUMBER
            ),
            $precision
        );
    }
}

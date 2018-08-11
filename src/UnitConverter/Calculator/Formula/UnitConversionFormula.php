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

namespace UnitConverter\Calculator\Formula;

/**
 * A generic unit conversion formula.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class UnitConversionFormula extends AbstractFormula
{
    protected $string = 'x = (a × b) ÷ c';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        return $this->calculator->round(
            $this->calculator->div(
                $this->calculator->mul($value, $fromUnits),
                $toUnits
            ),
            $precision
        );
    }
}

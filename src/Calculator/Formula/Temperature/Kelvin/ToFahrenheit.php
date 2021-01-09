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

namespace UnitConverter\Calculator\Formula\Temperature\Kelvin;

use UnitConverter\Calculator\Formula\Temperature\TemperatureFormula;

/**
 * Formula to convert Kelvin values to Fahrenheit.
 *
 * @version 1.0.0
 * @since 0.8.5
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class ToFahrenheit extends TemperatureFormula
{
    const FORMULA_STRING = '°F = (K - 273.15) × 9 ÷ 5 + 32';

    const FORMULA_TEMPLATE = '%s°F = (%sK - 273.15) × 9 ÷ 5 + 32';

    const MAGIC_NUMBER = 32;

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        // XXX: this formula assumes all calculators can accept strings, as it's the safest type.
        $subResult = $this->calculator->sub($value, (string) self::ZERO_C_TO_K);
        $divisor = $this->calculator->div('9', '5');
        $mulResult = $this->calculator->mul($subResult, $divisor);
        $addResult = $this->calculator->add($mulResult, (string) self::MAGIC_NUMBER);
        $result = $this->calculator->round($addResult, $precision);

        $this->plugVariables($result, $value);

        return $result;
    }
}

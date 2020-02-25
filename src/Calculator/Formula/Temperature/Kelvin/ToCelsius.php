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
 * Formula to convert Kelvin values to Celsius.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class ToCelsius extends TemperatureFormula
{
    const FORMULA_STRING = '°C = K − 273.15';

    const FORMULA_TEMPLATE = '%s°C = %sK − 273.15';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $subResult = $this->calculator->sub($value, self::ZERO_C_TO_K);
        $result = $this->calculator->round($subResult, $precision);

        $this->plugVariables($result, $value);

        return $result;
    }
}

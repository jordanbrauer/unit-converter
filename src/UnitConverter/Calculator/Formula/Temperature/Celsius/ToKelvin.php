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

namespace UnitConverter\Calculator\Formula\Temperature\Celsius;

use UnitConverter\Calculator\Formula\Temperature\TemperatureFormula;

/**
 * Formula to convert Celsius values to Kelvin.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class ToKelvin extends TemperatureFormula
{
    const FORMULA_STRING = 'K = °C + 273.15';

    const FORMULA_TEMPLATE = '%s K = %s°C + 273.15';

    const MAGIC_NUMBER = 273.15;

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        // XXX: this formula assumes all calculators can accept strings, as it's the safest type.
        $addResult = $this->calculator->add($value, (string) self::MAGIC_NUMBER);
        $result = $this->calculator->round($addResult, $precision);

        $this->plugVariables($result, $value);

        return $result;
    }
}

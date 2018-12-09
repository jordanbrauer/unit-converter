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
 * Formula to convert Celsius values to Fahrenheit.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class ToFahrenheit extends TemperatureFormula
{
    const FORMULA_STRING = '°F = (°C × (9 ÷ 5)) + 32';

    const FORMULA_TEMPLATE = '%s°F = (%s°C × (9 ÷ 5)) + 32';

    const MAGIC_NUMBER = 32;

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        // XXX: this formula assumes all calculators can accept strings, as it's the safest type.
        $divisor = $this->calculator->div('9', '5');
        $mulResult = $this->calculator->mul($value, $divisor);
        $addResult = $this->calculator->add($mulResult, (string) self::MAGIC_NUMBER);
        $result = $this->calculator->round($addResult, $precision);

        $this->plugVariables($result, $value);

        return $result;
    }
}

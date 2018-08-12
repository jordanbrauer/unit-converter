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

namespace UnitConverter\Calculator\Formula\Fahrenheit;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert Fahrenheit values to Celsius.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class ToCelsius extends AbstractFormula
{
    const FORMULA_STRING = '°C = (°F - 32) × (5 ÷ 9)';

    const FORMULA_TEMPLATE = '%s°C = (%s°F - 32) × (5 ÷ 9)';

    const MAGIC_NUMBER = 32;

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $divisor = $this->calculator->div(5, 9);
        $subResult = $this->calculator->sub($value, self::MAGIC_NUMBER);
        $mulResult = $this->calculator->mul($subResult, $divisor);
        $result = $this->calculator->round($mulResult, $precision);

        $this->plugVariables($result, $value);

        return $result;
    }
}

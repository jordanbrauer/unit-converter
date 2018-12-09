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

namespace UnitConverter\Calculator\Formula\Temperature\Fahrenheit;

use UnitConverter\Calculator\Formula\Temperature\TemperatureFormula;

/**
 * Formula to convert Fahrenheit values to Kelvin.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class ToKelvin extends TemperatureFormula
{
    const FORMULA_STRING = 'K = (°F + 459.67) × (5 ÷ 9)';

    const FORMULA_TEMPLATE = '%s K = (%s°F + 459.67) × (5 ÷ 9)';

    const MAGIC_NUMBER = 459.67;

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        return $this->fahrenheit($value, $precision, 'add');
    }
}

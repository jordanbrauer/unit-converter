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

namespace UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert Celsius values to Kelvin.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class ToMilesPerGallon extends AbstractFormula
{

    const MAGIC_NUMBER = 2.35215;

    const FORMULA_STRING = 'mpg = 2.35215 * km/l';

    const FORMULA_TEMPLATE = '%s mpg = 2.35215 * %skm/l';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        // XXX: this formula assumes all calculators can accept strings, as it's the safest type.
        $addResult = $this->calculator->mul(self::MAGIC_NUMBER, $value);
        $result = $this->calculator->round($addResult, $precision);

        $this->plugVariables($result, $value);

        return $result;
    }
}
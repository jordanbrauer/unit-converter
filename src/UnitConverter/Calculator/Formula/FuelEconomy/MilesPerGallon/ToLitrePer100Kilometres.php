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

namespace UnitConverter\Calculator\Formula\FuelEconomy\MilesPerGallon;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert Miles Per Gallon values to Litre Per 100 Kilometres.
 *
 * @version 1.0.0
 * @author Maksim Martianov <7222812+maksimru@users.noreply.github.com>
 */
class ToLitrePer100Kilometres extends AbstractFormula
{
    const FORMULA_STRING = 'L/100km = 235.215 / mpg';

    const FORMULA_TEMPLATE = '%s L/100km = 235.215 / %smpg';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        // XXX: this formula assumes all calculators can accept strings, as it's the safest type.
        $addResult = $this->calculator->div(235.215, $value);
        $result = $this->calculator->round($addResult, $precision);

        $this->plugVariables($result, $value);

        return $result;
    }
}

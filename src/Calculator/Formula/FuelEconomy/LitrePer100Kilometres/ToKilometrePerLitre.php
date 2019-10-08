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

namespace UnitConverter\Calculator\Formula\FuelEconomy\LitrePer100Kilometres;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert Litre Per 100 Kilometres values to Kilometre Per Litre.
 *
 * @version 1.0.0
 * @author Maksim Martianov <7222812+maksimru@users.noreply.github.com>
 */
class ToKilometrePerLitre extends AbstractFormula
{
    const FORMULA_STRING = 'km/l = 100 / L/100km';

    const FORMULA_TEMPLATE = '%s km/l = 100 / %sL/100km';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        // XXX: this formula assumes all calculators can accept strings, as it's the safest type.
        $addResult = $this->calculator->div(100, $value);
        $result = $this->calculator->round($addResult, $precision);

        $this->plugVariables($result, $value);

        return $result;
    }
}

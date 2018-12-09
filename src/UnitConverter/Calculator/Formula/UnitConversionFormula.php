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

namespace UnitConverter\Calculator\Formula;

/**
 * A generic unit conversion formula.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class UnitConversionFormula extends AbstractFormula
{
    const FORMULA_STRING = 'x = (a × b) ÷ c';

    const FORMULA_TEMPLATE = '%s = (%s × %s) ÷ %s';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $mulResult = $this->calculator->mul($value, $fromUnits);
        $divResult = $this->calculator->div($mulResult, $toUnits);
        $result = $this->calculator->round($divResult, $precision);

        $this->plugVariables($result, $value, $fromUnits, $toUnits);

        return $result;
    }
}

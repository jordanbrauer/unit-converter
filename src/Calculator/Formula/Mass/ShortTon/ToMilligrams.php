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

namespace UnitConverter\Calculator\Formula\Mass\ShortTon;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert long ton (imperial tons) values to milligrams.
 *
 * @version 1.0.0
 * @since 0.8.4
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class ToMilligrams extends AbstractFormula
{
    const FORMULA_STRING = 'mg = ton × 9.072e+8';

    const FORMULA_TEMPLATE = 'mg = %ston × 9.072e+8';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $result = $this->calculator->mul($value, 907200000);

        $this->plugVariables($result, $value);

        return $result;
    }
}

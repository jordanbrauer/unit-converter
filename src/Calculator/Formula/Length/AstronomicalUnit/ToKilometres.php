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

namespace UnitConverter\Calculator\Formula\Length\AstronomicalUnit;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert astronomial unit values to kilometres.
 *
 * @version 1.0.0
 * @since 0.8.4
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class ToKilometres extends AbstractFormula
{
    const FORMULA_STRING = 'km = au × 1.496e+8';

    const FORMULA_TEMPLATE = '%skm = %sau × 1.496e+8';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $result = $this->calculator->mul($value, 149600000);

        $this->plugVariables($result, $value);

        return $result;
    }
}

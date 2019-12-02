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
 * A "null" formula to use for when a unit conversion is attempted on itself.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class NullFormula extends AbstractFormula
{
    const FORMULA_STRING = 'x';

    const FORMULA_TEMPLATE = '%s';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $this->plugVariables($value);

        return $value;
    }
}

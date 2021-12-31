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

namespace UnitConverter\Calculator\Formula\DigitalStorage\Tebibit;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert tebibits values to mebibits.
 *
 * @version 1.0.0
 * @since 0.8.4
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class ToMebibits extends AbstractFormula
{
    const FORMULA_STRING = 'Mib = Tib × 1.049e+6';

    const FORMULA_TEMPLATE = 'Mib = %sTib × 1.049e+6';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $result = $this->calculator->mul($value, 1049000);

        $this->plugVariables($result, $value);

        return $result;
    }
}

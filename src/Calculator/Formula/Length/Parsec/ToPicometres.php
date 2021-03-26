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

namespace UnitConverter\Calculator\Formula\Length\Parsec;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert parsec values to picometres.
 *
 * @version 1.0.0
 * @since 0.8.4
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class ToPicometres extends AbstractFormula
{
    const FORMULA_STRING = 'pm = pc × 3.086e+28';

    const FORMULA_TEMPLATE = '%spm = %spc × 3.086e+28';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $result = $this->calculator->mul($value, 30859999999999998436430577664);

        $this->plugVariables($result, $value);

        return $result;
    }
}

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

namespace UnitConverter\Calculator\Formula\Length\Lightyear;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert lightyear values to decimetres.
 *
 * @version 1.0.0
 * @since 0.8.4
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class ToDecimetres extends AbstractFormula
{
    const FORMULA_STRING = 'dm = ly × 9.461e+16';

    const FORMULA_TEMPLATE = '%sdm = %sly × 9.461e+16';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $result = $this->calculator->mul($value, 94610000000000000);

        $this->plugVariables($result, $value);

        return $result;
    }
}

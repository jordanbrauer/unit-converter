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

namespace UnitConverter\Tests\Integration\Unit\Volume;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Volume\CubicMetre;
use UnitConverter\Unit\Volume\Gallon;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\Unit\Volume\Millilitre;
use UnitConverter\Unit\Volume\Pint;
use UnitConverter\UnitConverter;

/**
 * Ensure that a millilitre is a millilitre.
 *
 * @covers UnitConverter\Unit\Volume\Millilitre
 * @uses UnitConverter\Unit\Volume\Litre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class MillilitreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $ml = new Millilitre();

        yield from [
            '1 millilitre is 1,000,000 cubic metres' => [1, $ml, 0.000001, new CubicMetre(), 6],
            '1 millilitre is 0.000264172 gallons'    => [1, $ml, 0.000264172, new Gallon(), 9],
            '1 millilitre is 0.001 litres'           => [1, $ml, 0.001, new Litre(), 3],
            '1 millilitre is 1 millilitre'           => [1, $ml, 1.0, new Millilitre(), 0],
            '1 millilitre is 0.00211338 pints'       => [1, $ml, 0.00211338, new Pint(), 8],
        ];
    }
}

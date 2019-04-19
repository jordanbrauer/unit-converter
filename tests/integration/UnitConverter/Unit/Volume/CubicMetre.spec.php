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

use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Volume\CubicMetre;
use UnitConverter\Unit\Volume\Gallon;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\Unit\Volume\Millilitre;
use UnitConverter\Unit\Volume\Pint;

/**
 * Ensure that a cubic metre is a metre that has been cubed.
 *
 * @covers UnitConverter\Unit\Volume\CubicMetre
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
final class CubicMetreSpec extends TestCase
{
    public function correctConversions()
    {
        $m3 = new CubicMetre();

        yield from [ # NOTE: conversions taken from google unit converter
            '1 cubic metre is equal to 1 cubic metre'            => [1, $m3, 1.0, new CubicMetre(), 0],
            '1 cubic metre is equal to 264.17 US liquid gallons' => [1, $m3, 264.172, new Gallon(), 3],
            '1 cubic metre is equal to 1000 litres'              => [1, $m3, 1000.0, new Litre(), 0],
            '1 cubic metre is equal to 1000000 millilitres'      => [1, $m3, 1000000.0, new Millilitre(), 0],
            '1 cubic metre is equal to 2113.38 US liquid pints'  => [1, $m3, 2113.38, new Pint(), 2],
        ];
    }
}

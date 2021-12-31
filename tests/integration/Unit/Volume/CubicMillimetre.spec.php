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
use UnitConverter\Unit\Volume\CubicCentimetre;
use UnitConverter\Unit\Volume\CubicMetre;
use UnitConverter\Unit\Volume\CubicMillimetre;
use UnitConverter\Unit\Volume\Gallon;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\Unit\Volume\Millilitre;
use UnitConverter\Unit\Volume\Pint;

/**
 * Ensure that a cubic millimetre is a millimetre that has been cubed.
 *
 * @covers UnitConverter\Unit\Volume\CubicMillimetre
 * @uses UnitConverter\ConverterBuilder
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
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\FuelEconomy\KilometrePerLitre
 * @uses UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Unit\Volume\Gallon
 * @uses UnitConverter\Unit\Volume\Millilitre
 * @uses UnitConverter\Unit\Volume\Pint
 * @uses UnitConverter\Unit\Volume\CubicCentimetre
 * @uses UnitConverter\Unit\Volume\CubicMetre
 */
final class CubicMillimetreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mm3 = new CubicMillimetre(1);

        yield from [ # NOTE: conversions taken from google unit converter
            '1 cubic millimetre is equal to 1 cubic millimetre'              => [$mm3, new CubicMillimetre(1.0), 0],
            '1 cubic millimetre is equal to 0.00000026417 US liquid gallons' => [$mm3, new Gallon(0.00000026417), 11],
            '1 cubic millimetre is equal to 0.000001 litres'                 => [$mm3, new Litre(0.000001), 6],
            '1 cubic millimetre is equal to 0.001 millilitres'               => [$mm3, new Millilitre(0.001), 3],
            '1 cubic millimetre is equal to 0.0000021134 US liquid pints'    => [$mm3, new Pint(0.0000021134), 10],
            '1 cubic millimetre is equal to 0.001 cubic centimetres'         => [$mm3, new CubicCentimetre(0.001), 3],
            '1 cubic millimetre is equal to 0.000000001 cubic metres'        => [$mm3, new CubicMetre(0.000000001), 10],
        ];
    }
}

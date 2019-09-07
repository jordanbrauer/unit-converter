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
 * Ensure that a U.S. gallon is a U.S. gallon.
 *
 * @covers UnitConverter\Unit\Volume\Gallon
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
 * @uses UnitConverter\Unit\Volume\CubicMetre
 * @uses UnitConverter\Unit\Volume\Millilitre
 * @uses UnitConverter\Unit\Volume\Pint
 */
final class GallonSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $gal = new Gallon(1);

        yield from [ # NOTE: conversions taken from google unit converter
            '1 gallon is equal to 0.004 cubic metres' => [$gal, new CubicMetre(0.004), 3],
            '1 gallon is equal to 1 gallon'           => [$gal, new Gallon(1.0), 0],
            '1 gallon is equal to 3.79 litres'        => [$gal, new Litre(3.785), 3],
            '1 gallon is equal to 3785.4 millilitres' => [$gal, new Millilitre(3785.41), 2],
            '1 gallon is equal to 8 pints'            => [$gal, new Pint(8.0), 0],
        ];
    }
}

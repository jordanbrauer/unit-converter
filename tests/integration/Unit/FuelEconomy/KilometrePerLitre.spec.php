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

namespace UnitConverter\Tests\Integration\Unit\FuelEconomy;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\FuelEconomy\KilometrePerLitre;
use UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres;
use UnitConverter\Unit\FuelEconomy\MilesPerGallon;
use UnitConverter\UnitConverter;

/**
 *
 * @covers UnitConverter\Unit\FuelEconomy\KilometrePerLitre
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToMilesPerGallon
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToLitrePer100Kilometres
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToMilesPerGallon
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\KilometrePerLitre\ToLitrePer100Kilometres
 */
class KilometrePerLitreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $kml = new KilometrePerLitre();

        yield from [
            '1 kilometre-per-litre is equal to 2.35215 miles-per-gallon'     => [$kml, new MilesPerGallon(2.35215), 5],
            '1 kilometre-per-litre is equal to 1 kilometre-per-litre'        => [$kml, new KilometrePerLitre('1'), 0],
            '1 kilometre-per-litre is equal to 100 litre-per-100-kilometres' => [$kml, new LitrePer100Kilometres(100.0), 0],
        ];
    }
}

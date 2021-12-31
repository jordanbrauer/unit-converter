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
 * @covers UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\FuelEconomy\KilometrePerLitre
 * @uses UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\LitrePer100Kilometres\ToKilometrePerLitre
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\LitrePer100Kilometres\ToMilesPerGallon
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\LitrePer100Kilometres\ToKilometrePerLitre
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\LitrePer100Kilometres\ToMilesPerGallon
 * @uses UnitConverter\Unit\FuelEconomy\MilesPerGallon
 */
class LitrePer100KilometresSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $l100km = new LitrePer100Kilometres();

        yield from [
            '1 litre-per-100-kilometres is equal to 235.215 miles-per-gallon'   => [$l100km, new MilesPerGallon(235.215), 3],
            '1 litre-per-100-kilometres is equal to 100 kilometre-per-litre'    => [$l100km, new KilometrePerLitre(100.0), 0],
            '1 litre-per-100-kilometres is equal to 1 litre-per-100-kilometres' => [$l100km, new LitrePer100Kilometres('1'), 0],
        ];
    }
}

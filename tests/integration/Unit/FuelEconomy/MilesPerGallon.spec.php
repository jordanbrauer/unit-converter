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
 * @covers UnitConverter\Unit\FuelEconomy\MilesPerGallon
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\FuelEconomy\KilometrePerLitre
 * @uses UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\MilesPerGallon\ToKilometrePerLitre
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\MilesPerGallon\ToLitrePer100Kilometres
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 * @uses UnitConverter\Unit\FuelEconomy\LitrePer100Kilometres
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\MilesPerGallon\ToKilometrePerLitre
 * @uses UnitConverter\Calculator\Formula\FuelEconomy\MilesPerGallon\ToLitrePer100Kilometres
 */
class MilesPerGallonSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mpg = new MilesPerGallon();

        yield from [
            '1 miles-per-gallon is equal to 1 miles-per-gallon'               => [$mpg, new MilesPerGallon('1'), 0],
            '1 miles-per-gallon is equal to 0.425144 kilometre-per-litre'     => [$mpg, new KilometrePerLitre(0.425144), 6],
            '1 miles-per-gallon is equal to 235.215 litre-per-100-kilometres' => [$mpg, new LitrePer100Kilometres(235.215), 3],
        ];
    }
}

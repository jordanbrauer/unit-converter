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

namespace UnitConverter\Tests\Integration\Unit\Energy;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Energy\Calorie;
use UnitConverter\Unit\Energy\FootPound;
use UnitConverter\Unit\Energy\Joule;
use UnitConverter\Unit\Energy\Kilojoule;
use UnitConverter\Unit\Energy\KilowattHour;
use UnitConverter\Unit\Energy\Megaelectronvolt;
use UnitConverter\Unit\Energy\Megajoule;
use UnitConverter\Unit\Energy\MegawattHour;
use UnitConverter\Unit\Energy\NewtonMetre;
use UnitConverter\Unit\Energy\WattHour;
use UnitConverter\UnitConverter;

/**
 * Ensure that a calorie is infact, a calorie.
 *
 * @covers UnitConverter\Unit\Energy\Calorie
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Energy\Joule
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
class CalorieSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $cal = new Calorie(1);

        yield from [
            '1 calorie is equal to 1 calorie'                 => [$cal, new Calorie(1.0), 0],
            '1 calorie is equal to 3085.96 foot pounds'       => [$cal, new FootPound(3085.96), 2],
            '1 calorie is equal to 4184 joules'               => [$cal, new Joule(4184.0), 0],
            '1 calorie is equal to 4.184 kilojoules'          => [$cal, new Kilojoule(4.184), 3],
            '1 calorie is equal to 0.00116222 kilowatt hours' => [$cal, new KilowattHour(0.00116222), 8],
            /* NOTE: this test or conversion is fucked */ // '1 calorie is equal to 26,114,419,104,000,000 megaelectronvolts' => [$cal, new Megaelectronvolt(26114419104000000.0), 0],
            '1 calorie is equal to 0.004184 megajoules'          => [$cal, new Megajoule(0.004184), 6],
            '1 calorie is equal to 0.00000116222 megawatt hours' => [$cal, new MegawattHour(0.00000116222), 11],
            '1 calorie is equal to 4,184 newton metres'          => [$cal, new NewtonMetre(4184.0), 0],
            '1 calorie is equal to 1.16222 watt hours'           => [$cal, new WattHour(1.16222), 5],
        ];
    }
}

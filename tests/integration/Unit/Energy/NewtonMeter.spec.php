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
 * Ensure that a joule is infact, a joule.
 *
 * @covers UnitConverter\Unit\Energy\NewtonMetre
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
final class NewtonMetreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $nm = new NewtonMetre(1);

        yield from [
            '1 newton metre is equal to 1 newton metre'                   => [$nm, new NewtonMetre(1.0), 0],
            '1 newton metre is equal to 1 joule'                          => [$nm, new Joule(1.0), 0],
            '1 newton metre is equal to 0.001 kilojoules'                 => [$nm, new Kilojoule(0.001), 3],
            '1 newton metre is equal to 0.000001 megajoules'              => [$nm, new Megajoule(0.000001), 6],
            '1 newton metre is equal to 0.000277778 watt hours'           => [$nm, new WattHour(0.000277778), 9],
            '1 newton metre is equal to 0.00000027778 kilowatt hours'     => [$nm, new KilowattHour(0.00000027778), 11],
            '1 newton metre is equal to 0.000000000277778 megawatt hours' => [$nm, new MegawattHour(0.000000000277778), 15],
            '1 newton metre is equal to 0.000239006 calories'             => [$nm, new Calorie(0.000239006), 9],
            '1 newton metre is equal to 0.737562 foot pounds'             => [$nm, new FootPound(0.737562), 6],
            /* NOTE: this test or conversion is fucked */ // '1 newton metre is equal to 26,114,419,104,000,000 megaelectronvolts' => [$nm, new Megaelectronvolt(26114419104000000.0), 0],
        ];
    }
}

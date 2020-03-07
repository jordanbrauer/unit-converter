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
use UnitConverter\Unit\Energy\Megajoule;
use UnitConverter\Unit\Energy\MegawattHour;
use UnitConverter\Unit\Energy\NewtonMetre;
use UnitConverter\Unit\Energy\WattHour;
use UnitConverter\UnitConverter;

/**
 * Ensure that a calorie is infact, a calorie.
 *
 * @covers UnitConverter\Unit\Energy\FootPound
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
class FootPoundSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $ftlbf = new FootPound(1);

        yield from [
            '1 foot pound is equal to 0.000324048 calories'                     => [$ftlbf, new Calorie(0.000324048), 9],
            '1 foot pound is equal to 1 foot pounds'                            => [$ftlbf, new FootPound(1.0), 0],
            '1 foot pound is equal to 1.35582 joules'                           => [$ftlbf, new Joule(1.35582), 5],
            '1 foot pound is equal to 0.00135582 kilojoules'                    => [$ftlbf, new Kilojoule(0.00135582), 8],
            '1 foot pound is equal to 0.00000037662 kilowatt hours'             => [$ftlbf, new KilowattHour(0.00000037662), 11],
            '1 foot pound is equal to 0.00000135582 megajoules'                 => [$ftlbf, new Megajoule(0.00000135582), 11],
            '1 foot pound is equal to 0.000000000376616 megawatt hours'         => [$ftlbf, new MegawattHour(0.000000000376616), 15],
            '1 foot pound is equal to 1.36 newton metres'                       => [$ftlbf, new NewtonMetre(1.36), 2],
            '1 foot pound is equal to 0.00037661609675872 watt hours'           => [$ftlbf, new WattHour(0.00037661609675872), 17],
            /* NOTE: this test or conversion is fucked */ // '1 foot pound is equal to 26,114,419,104,000,000 megaelectronvolts' => [$ftlbf, new Megaelectronvolt(26114419104000000.0), 0],
        ];
    }
}

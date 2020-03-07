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
 * Ensure that a joule is infact, a joule.
 *
 * @covers UnitConverter\Unit\Energy\KilowattHour
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
final class KilowattHourSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $kj = new KilowattHour(1);

        yield from [
            '1 kilowatt hour is equal to 3,600,000 newton metres' => [$kj, new NewtonMetre(3600000.0), 0],
            '1 kilowatt hour is equal to 3,600,000 joules'        => [$kj, new Joule(3600000.0), 0],
            '1 kilowatt hour is equal to 3,600 kilojoules'        => [$kj, new Kilojoule(3600.0), 0],
            '1 kilowatt hour is equal to 3.6 megajoules'          => [$kj, new Megajoule(3.6), 1],
            '1 kilowatt hour is equal to 0.001 megawatt hours'    => [$kj, new MegawattHour(0.001), 3],
            '1 kilowatt hour is equal to 1,000 watt hours'        => [$kj, new WattHour(1000.0), 0],
            '1 kilowatt hour is equal to 1 kilowatt hours'        => [$kj, new KilowattHour(1.0), 0],
            '1 kilowatt hour is equal to 860.421 calories'        => [$kj, new Calorie(860.421), 3],
            '1 kilowatt hour is equal to 2,655,224 foot pounds'   => [$kj, new FootPound(2655224.0), 0],
            /* NOTE: this test or conversion is fucked */ // '1 kilowatt hour is equal to 26,114,419,104,000,000 megaelectronvolts' => [$kj, new Megaelectronvolt(26114419104000000.0), 0],
        ];
    }
}

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
 * @covers UnitConverter\Unit\Energy\Kilojoule
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
class KilojouleSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $kj = new Kilojoule(1);

        yield from [
            '1 kilojoule is equal to 1,000 newton metres'                => [$kj, new NewtonMetre(1000.0), 0],
            '1 kilojoule is equal to 1,000 joules'                       => [$kj, new Joule(1000.0), 0],
            '1 kilojoule is equal to 1 kilojoules'                       => [$kj, new Kilojoule(1.0), 0],
            '1 kilojoule is equal to 0.001 megajoules'                   => [$kj, new Megajoule(0.001), 3],
            '1 kilojoule is equal to 0.000000277778 megawatt hours'      => [$kj, new MegawattHour(0.000000277778), 12],
            '1 kilojoule is equal to 0.27777777777778 watt hours'        => [$kj, new WattHour(0.27777777777778), 14],
            '1 kilojoule is equal to 0.00027777777777778 kilowatt hours' => [$kj, new KilowattHour(0.00027777777777778), 17],
            '1 kilojoule is equal to 0.239006 calories'                  => [$kj, new Calorie(0.239006), 6],
            '1 kilojoule is equal to 737.562 foot pounds'                => [$kj, new FootPound(737.562), 3],
            /* NOTE: this test or conversion is fucked */ // '1 kilojoule is equal to 26,114,419,104,000,000 megaelectronvolts' => [$kj, new Megaelectronvolt(26114419104000000.0), 0],
        ];
    }
}

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
 * @covers UnitConverter\Unit\Energy\Megajoule
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
final class MegajouleSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mj = new Megajoule(1);

        yield from [
            '1 megajoule is equal to 1 megajoule'                => [$mj, new Megajoule(1.0), 0],
            '1 megajoule is equal to 1,000,000 newton metres'    => [$mj, new NewtonMetre(1000000.0), 0],
            '1 megajoule is equal to 1,000,000 joules'           => [$mj, new Joule(1000000.0), 0],
            '1 megajoule is equal to 1,000 kilojoules'           => [$mj, new Kilojoule(1000.0), 0],
            '1 megajoule is equal to 0.000277778 megawatt hours' => [$mj, new MegawattHour(0.000277778), 9],
            '1 megajoule is equal to 277.778 watt hours'         => [$mj, new WattHour(277.778), 3],
            '1 megajoule is equal to 0.277778 kilowatt hours'    => [$mj, new KilowattHour(0.277778), 6],
            '1 megajoule is equal to 239.006 calories'           => [$mj, new Calorie(239.006), 3],
            '1 megajoule is equal to 737,562 foot pounds'        => [$mj, new FootPound(737562.0), 0],
            /* NOTE: this test or conversion is fucked */ // '1 megajoule is equal to 1.0 megaelectronvolt' => [$mj, new Megaelectronvolt(1.0), 0],
        ];
    }
}

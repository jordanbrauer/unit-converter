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
 * @covers UnitConverter\Unit\Energy\Megaelectronvolt
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
final class MegaelectronvoltSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mev = new Megaelectronvolt(1);

        yield from [
            '1 megaelectronvolt is equal to 1 megaelectronvolt'                            => [$mev, new Megaelectronvolt(1.0), 0],
            '1 megaelectronvolt is equal to 0.000000000000160218 newton metres'            => [$mev, new NewtonMetre(0.000000000000160218), 18],
            '1 megaelectronvolt is equal to 0.000000000000160218 joules'                   => [$mev, new Joule(0.000000000000160218), 18],
            '1 megaelectronvolt is equal to 0.00000000000000016022 kilojoules'             => [$mev, new Kilojoule(0.00000000000000016022), 20],
            '1 megaelectronvolt is equal to 0.000000000000000000160218 megajoules'         => [$mev, new Megajoule(0.000000000000000000160218), 24],
            '1 megaelectronvolt is equal to 0.0000000000000000000000445049 megawatt hours' => [$mev, new MegawattHour(0.0000000000000000000000445049), 28],
            '1 megaelectronvolt is equal to 0.000000000000000044505 watt hours'            => [$mev, new WattHour(0.000000000000000044505), 21],
            '1 megaelectronvolt is equal to 0.000000000000000000044505 kilowatt hours'     => [$mev, new KilowattHour(0.000000000000000000044505), 24],
            '1 megaelectronvolt is equal to 0.000000000000000038293 calories'              => [$mev, new Calorie(0.000000000000000038293), 21],
            '1 megaelectronvolt is equal to 0.00000000000011817 foot pounds'               => [$mev, new FootPound(0.00000000000011817), 17],
        ];
    }
}

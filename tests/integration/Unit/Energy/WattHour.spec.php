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
 * @covers UnitConverter\Unit\Energy\WattHour
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
final class WattHourSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $wh = new WattHour(1);

        yield from [
            '1 watt hour is equal to 1 watt hour'                 => [$wh, new WattHour(1.0), 0],
            '1 watt hour is equal to 3,600 newton metres'         => [$wh, new NewtonMetre(3600.0), 0],
            '1 watt hour is equal to 3,600 joules'                => [$wh, new Joule(3600.0), 0],
            '1 watt hour is equal to 3.6 kilojoules'              => [$wh, new Kilojoule(3.6), 1],
            '1 watt hour is equal to 0.0036 megajoules'           => [$wh, new Megajoule(0.0036), 4],
            '1 watt hour is equal to 0.000001 megawatt hours'     => [$wh, new MegawattHour(0.000001), 6],
            '1 watt hour is equal to 0.001 kilowatt hours'        => [$wh, new KilowattHour(0.001), 3],
            '1 watt hour is equal to 0.85984522785899 calories'   => [$wh, new Calorie(0.860421), 6],
            '1 watt hour is equal to 2655.2237373982 foot pounds' => [$wh, new FootPound(2655.2237373982), 20],
            // '1 watt hour is equal to 1 megaelectronvolt' => [$wh, new Megaelectronvolt(1.0), 0],
        ];
    }
}

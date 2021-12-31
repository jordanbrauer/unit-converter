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
 * @covers UnitConverter\Unit\Energy\MegawattHour
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
final class MegawattHourSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mwh = new MegawattHour(1);

        yield from [
            '1 megawatt hour is equal to 1 megawatt hour'                                  => [$mwh, new MegawattHour(1.0), 0],
            '1 megawatt hour is equal to 3,600,000,000 newton metres'                      => [$mwh, new NewtonMetre(3600000000.0), 0],
            '1 megawatt hour is equal to 3,600,000,000 joules'                             => [$mwh, new Joule(3600000000.0), 0],
            '1 megawatt hour is equal to 3,600 megajoules'                                 => [$mwh, new Megajoule(3600.0), 0],
            '1 megawatt hour is equal to 3,600,000 kilojoules'                             => [$mwh, new Kilojoule(3600000.0), 0],
            '1 megawatt hour is equal to 1,000,000 watt hours'                             => [$mwh, new WattHour(1000000.0), 0],
            '1 megawatt hour is equal to 1,000 kilowatt hours'                             => [$mwh, new KilowattHour(1000.0), 0],
            '1 megawatt hour is equal to 860,421 calories'                                 => [$mwh, new Calorie(860421.0), 0],
            '1 megawatt hour is equal to 2,655,223,737 foot pounds'                        => [$mwh, new FootPound(2655223737.0), 0],
            '1 megawatt hour is equal to 22,469,385,462,307,604,135,936 megaelectronvolts' => [$mwh, new Megaelectronvolt(22469385462307604135936.0), 0],
        ];
    }
}

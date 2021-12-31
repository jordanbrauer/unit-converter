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

namespace UnitConverter\Tests\Integration\Unit\Volume;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Volume\CubicCentimetre;
use UnitConverter\Unit\Volume\CubicMetre;
use UnitConverter\Unit\Volume\CubicMillimetre;
use UnitConverter\Unit\Volume\Gallon;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\Unit\Volume\Millilitre;
use UnitConverter\Unit\Volume\Pint;

/**
 * Ensure that a litre is litre.
 *
 * @covers UnitConverter\Unit\Volume\Litre
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 * @usrs UnitConverter\Unit\Volume\CubicCentimetre
 * @usrs UnitConverter\Unit\Volume\CubicMillimetre
 */
class LitreSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $l = new Litre(1);

        yield from [
            '1 litre is equal to 0.001 cubic metres'             => [$l, new CubicMetre(0.001), 3],
            '1 litre is equal to 0.264172 gallons'               => [$l, new Gallon(0.264172), 6],
            '1 litre is equal to 1 litre'                        => [$l, new Litre(1.0), 0],
            '1 litre is equal to 1000 millilitres'               => [$l, new Millilitre(1000.0), 0],
            '1 litre is equal to 2.11338 pints'                  => [$l, new Pint(2.11338), 5],
            '1 litre is equal to 1000000 cubic millimetres'      => [$l, new CubicMillimetre(1000000.0), 0],
            '1 litre is equal to 1000 cubic centimetres'         => [$l, new CubicCentimetre(1000.0), 0],
        ];
    }
}

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
use UnitConverter\Unit\Volume\CubicMetre;
use UnitConverter\Unit\Volume\Gallon;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\Unit\Volume\Millilitre;
use UnitConverter\Unit\Volume\Pint;
use UnitConverter\UnitConverter;

/**
 * Ensure that a pint is a pint.
 *
 * @covers UnitConverter\Unit\Volume\Pint
 * @uses UnitConverter\Unit\Volume\Litre
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
class PintSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $pt = new Pint();

        yield from [
            '1 pint is equal to 0.000473176 cubic metres' => [1, $pt, 0.000473176, new CubicMetre(), 9],
            '1 pint is equal to 0.125 gallons'            => [1, $pt, 0.125, new Gallon(), 3],
            '1 pint is equal to 0.473176 litres'          => [1, $pt, 0.473176, new Litre(), 6],
            '1 pint is equal to 473.176 millilitre'       => [1, $pt, 473.176, new Millilitre(), 3],
            '1 pint is equal to 1 pint'                   => [1, $pt, 1.0, new Pint(), 0],
        ];
    }
}

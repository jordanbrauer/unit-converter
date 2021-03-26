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

namespace UnitConverter\Tests\Integration\Unit\Length;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Length\AstronomicalUnit;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Decimetre;
use UnitConverter\Unit\Length\Foot;
use UnitConverter\Unit\Length\Hand;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\Unit\Length\Kilometre;
use UnitConverter\Unit\Length\Lightyear;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\Length\Micrometre;
use UnitConverter\Unit\Length\Mile;
use UnitConverter\Unit\Length\Millimetre;
use UnitConverter\Unit\Length\Nanometre;
use UnitConverter\Unit\Length\Parsec;
use UnitConverter\Unit\Length\Picometre;
use UnitConverter\Unit\Length\Yard;
use UnitConverter\UnitConverter;

/**
 * Ensure that an inch is infact, an inch.
 *
 * @covers UnitConverter\Unit\Length\Inch
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Length\Metre
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
class InchSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $in = new Inch();

        yield from [
            '1 inch is equal to 0.000000000000169789 astronomical units' => [$in, new AstronomicalUnit(0.000000000000169789), 18],
            '1 inch is equal to 2.54 centimetres'                        => [$in, new Centimetre(2.54), 2],
            '1 inch is equal to 0.254 decimetres'                        => [$in, new Decimetre(0.254), 3],
            '1 inch is equal to 0.0833333 feet'                          => [$in, new Foot(0.0833333), 7],
            '1 inch is equal to 0.25 hands'                              => [$in, new Hand(0.25), 2],
            '1 inch is equal to 1 inch'                                  => [$in, new Inch(1.0), 0],
            '1 inch is equal to 0.0000254 kilometres'                    => [$in, new Kilometre(0.0000254), 7],
            '1 inch is equal to 0.00000000000000000268478 lightyears'    => [$in, new Lightyear(0.00000000000000000268478), 23],
            '1 inch is equal to 0.0254 metres'                           => [$in, new Metre(0.0254), 4],
            '1 inch is equal to 25,400 micrometres'                      => [$in, new Micrometre(25400.0), 0],
            '1 inch is equal to 0.000015783 miles'                       => [$in, new Mile(0.000015783), 9],
            '1 inch is equal to 25.4 millimetres'                        => [$in, new Millimetre(25.4), 1],
            '1 inch is equal to 25,400,000 nanometres'                   => [$in, new Nanometre(25400000.0), 0],
            '1 inch is equal to 0.000000000000000000823158 parsecs'      => [$in, new Parsec(0.000000000000000000823158), 24],
            '1 inch is equal to 25,400,000,000 picometres'               => [$in, new Picometre(25400000000.0), 0],
            '1 inch is equal to 0.0277778 yard'                          => [$in, new Yard(0.0277778), 7],
        ];
    }
}

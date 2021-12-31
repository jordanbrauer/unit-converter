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
 * Ensure that a yard is a yard.
 *
 * @covers UnitConverter\Unit\Length\Yard
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
class YardSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $yd = new Yard();

        yield from [
            '1 yard is equal to 0.000000000000000096652 astronomical units' => [$yd, new AstronomicalUnit(0.000000000000000096652), 21],
            '1 yard is equal to 91.44 centimetres'                          => [$yd, new Centimetre(91.44), 2],
            '1 yard is equal to 9.144 decimetres'                           => [$yd, new Decimetre(9.144), 3],
            '1 yard is equal to 3 feet'                                     => [$yd, new Foot(3.0), 0],
            '1 yard is equal to 9 hands'                                    => [$yd, new Hand(9.0), 0],
            '1 yard is equal to 36 inches'                                  => [$yd, new Inch(36.0), 0],
            '1 yard is equal to 0.0009144 kilometres'                       => [$yd, new Kilometre(0.0009144), 7],
            '1 yard is equal to 0.000000000000000096652 lightyears'         => [$yd, new Lightyear(0.000000000000000096652), 21],
            '1 yard is equal to 0.9144 metres'                              => [$yd, new Metre(0.9144), 4],
            '1 yard is equal to 914,400 micrometres'                        => [$yd, new Micrometre(914400.0), 0],
            '1 yard is equal to 0.000568182 miles'                          => [$yd, new Mile(0.000568182), 9],
            '1 yard is equal to 914.4 millimetres'                          => [$yd, new Millimetre(914.4), 1],
            '1 yard is equal to 914,400,000 nanometres'                     => [$yd, new Nanometre(914400000.0), 0],
            '1 yard is equal to 0.0000000000000000296337 parsecs'           => [$yd, new Parsec(0.0000000000000000296337), 22],
            '1 yard is equal to 914,400,000,000 picometres'                 => [$yd, new Picometre(914400000000.0), 0],
            '1 yard is equal to 1 yard'                                     => [$yd, new Yard(1.0), 0],
        ];
    }
}

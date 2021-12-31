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
 * Ensure that a hand is a hand.
 *
 * @covers UnitConverter\Unit\Length\Hand
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
class HandSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $h = new Hand();

        yield from [
            '1 hand is equal to 0.000000000000679154 astronomical units' => [$h, new AstronomicalUnit(0.000000000000679154), 18],
            '1 hand is equal to 10.16 centimetres'                       => [$h, new Centimetre(10.16), 2],
            '1 hand is equal to 1.016 decimetres'                        => [$h, new Decimetre(1.016), 3],
            '1 hand is equal to 0.333333 feet'                           => [$h, new Foot(0.333333), 6],
            '1 hand is equal to 1 hand'                                  => [$h, new Hand(1.0), 0],
            '1 hand is equal to 4 inches'                                => [$h, new Inch(4.0), 0],
            '1 hand is equal to 0.0001016 kilometres'                    => [$h, new Kilometre(0.0001016), 7],
            '1 hand is equal to 0.0000000000000000107391 lightyears'     => [$h, new Lightyear(0.0000000000000000107391), 22],
            '1 hand is equal to 0.1016 metres'                           => [$h, new Metre(0.1016), 4],
            '1 hand is equal to 101,600 micrometres'                     => [$h, new Micrometre(101600.0), 0],
            '1 hand is equal to 0.00006313 miles'                        => [$h, new Mile(0.00006313), 8],
            '1 hand is equal to 101.6 millimetres'                       => [$h, new Millimetre(101.6), 1],
            '1 hand is equal to 101,600,000 nanometres'                  => [$h, new Nanometre(101600000.0), 0],
            '1 hand is equal to 0.00000000000000000329263 parsecs'       => [$h, new Parsec(0.00000000000000000329263), 23],
            '1 hand is equal to 101,600,000,000 picometres'              => [$h, new Picometre(101600000000.0), 0],
            '1 hand is equal to 0.111111 yard'                           => [$h, new Yard(0.111111), 6],
        ];
    }
}

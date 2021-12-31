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
 * Ensure that a parsec is infact, a parsec.
 *
 * @covers UnitConverter\Unit\Length\Parsec
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToCentimetres
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToDecimetres
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToFeet
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToHands
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToInches
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToKilometres
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToMicrometres
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToMiles
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToMillimetres
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToNanometres
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToPicometres
 * @uses \UnitConverter\Calculator\Formula\Length\Parsec\ToYards
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class ParsecSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $pc = new Parsec();

        yield from [
            '1 parsec is equal to 206,265 astronomical units'                        => [$pc, new AstronomicalUnit(206265.0), 0],
            '1 parsec is equal to 3,086,000,000,000,000,000 centimetres'             => [$pc, new Centimetre(3086000000000000000), 0],
            '1 parsec is equal to 308,600,000,000,000,000 decimetres'                => [$pc, new Decimetre(308600000000000000), 0],
            '1 parsec is equal to 101,200,000,000,000,000 feet'                      => [$pc, new Foot(101200000000000000), 0],
            '1 parsec is equal to 303,700,000,000,000,000 hands'                     => [$pc, new Hand(303700000000000000), 0],
            '1 parsec is equal to 1,215,000,000,000,000,000 inches'                  => [$pc, new Inch(1215000000000000000), 0],
            '1 parsec is equal to 30,860,000,000,000 kilometres'                     => [$pc, new Kilometre(30860000000000), 0],
            '1 parsec is equal to 3.26156 lightyears'                                => [$pc, new Lightyear(3.26156), 5],
            '1 parsec is equal to 1.0 metres'                                        => [$pc, new Metre(30856775814913672.789139379577965), 15],
            '1 parsec is equal to 30,860,000,000,000,001,048,576 micrometres'        => [$pc, new Micrometre(30860000000000001048576), 0],
            '1 parsec is equal to 19,170,000,000,000 miles'                          => [$pc, new Mile(19170000000000), 0],
            '1 parsec is equal to 30,860,000,000,000,000,000 millimetres'            => [$pc, new Millimetre(30860000000000000000), 0],
            '1 parsec is equal to 30,860,000,000,000,001,082,130,432 nanometres'     => [$pc, new Nanometre(30860000000000001082130432), 0],
            '1 parsec is equal to 1 parsec'                                          => [$pc, new Parsec(1.0), 0],
            '1 parsec is equal to 30,859,999,999,999,998,436,430,577,664 picometres' => [$pc, new Picometre(30859999999999998436430577664), 0],
            '1 parsec is equal to 33,750,000,000,000,000 yard'                       => [$pc, new Yard(33750000000000000), 0],
        ];
    }
}

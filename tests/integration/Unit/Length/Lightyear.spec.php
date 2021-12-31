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
 * Ensure that a lightyear is infact, a lightyear.
 *
 * @covers UnitConverter\Unit\Length\Lightyear
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToCentimetres
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToDecimetres
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToFeet
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToHands
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToInches
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToKilometres
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToMicrometres
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToMiles
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToMillimetres
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToNanometres
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToPicometres
 * @uses UnitConverter\Calculator\Formula\Length\Lightyear\ToYards
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class LightyearSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $ly = new Lightyear();

        yield from [
            '1 lightyear is equal to 63,241.1 astronomical units'                      => [$ly, new AstronomicalUnit(63241.1), 1],
            '1 lightyear is equal to 946,100,000,000,000,000 centimetres'              => [$ly, new Centimetre(946100000000000000), 0],
            '1 lightyear is equal to 94,610,000,000,000,000 decimetres'                => [$ly, new Decimetre(94610000000000000), 0],
            '1 lightyear is equal to 31,040,000,000,000,000 feet'                      => [$ly, new Foot(31040000000000000), 0],
            '1 lightyear is equal to 93,120,000,000,000,000 hands'                     => [$ly, new Hand(93120000000000000), 0],
            '1 lightyear is equal to 372,500,000,000,000,000 inches'                   => [$ly, new Inch(372500000000000000), 0],
            '1 lightyear is equal to 9,461,000,000,000 kilometres'                     => [$ly, new Kilometre(9461000000000), 0],
            '1 lightyear is equal to 1 lightyear'                                      => [$ly, new Lightyear(1.0), 0],
            '1 lightyear is equal to 9,460,730,472,580,800 metres'                     => [$ly, new Metre(9460730472580800.0), 0],
            '1 lightyear is equal to 9,461,000,000,000,000,786,432 micrometres'        => [$ly, new Micrometre(9461000000000000786432), 0],
            '1 lightyear is equal to 5,879,000,000,000 miles'                          => [$ly, new Mile(5879000000000), 0],
            '1 lightyear is equal to 9,461,000,000,000,000,000 millimetres'            => [$ly, new Millimetre(9461000000000000000), 0],
            '1 lightyear is equal to 9,460,999,999,999,999,746,244,608 nanometres'     => [$ly, new Nanometre(9460999999999999746244608), 0],
            '1 lightyear is equal to 0.306601 parsecs'                                 => [$ly, new Parsec(0.306601), 6],
            '1 lightyear is equal to 9,460,999,999,999,999,935,223,169,024 picometres' => [$ly, new Picometre(9460999999999999935223169024), 0],
            '1 lightyear is equal to 10,350,000,000,000,000 yard'                      => [$ly, new Yard(10350000000000000), 0],
        ];
    }
}

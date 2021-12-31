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
 * Ensure that an astronomical unit is an astronomical unit.
 *
 * @covers UnitConverter\Unit\Length\AstronomicalUnit
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToCentimetres
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToDecimetres
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToFeet
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToHands
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToInches
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToKilometres
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToMicrometres
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToMiles
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToMillimetres
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToNanometres
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToPicometres
 * @uses UnitConverter\Calculator\Formula\Length\AstronomicalUnit\ToYards
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class AstronomicalUnitSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $au = new AstronomicalUnit();

        yield from [
            '1 astronomical unit is equal to 1 astronomical unit'                        => [$au, new AstronomicalUnit(1.0), 0],
            '1 astronomical unit is equal to 14,960,000,000,000 centimetres'             => [$au, new Centimetre(14960000000000), 0],
            '1 astronomical unit is equal to 1,496,000,000,000 decimetres'               => [$au, new Decimetre(1496000000000), 0],
            '1 astronomical unit is equal to 490,800,000,000 feet'                       => [$au, new Foot(490800000000), 0],
            '1 astronomical unit is equal to 1,472,000,000,000 hands'                    => [$au, new Hand(1472000000000), 0],
            '1 astronomical unit is equal to 5,890,000,000,000 inches'                   => [$au, new Inch(5890000000000), 0],
            '1 astronomical unit is equal to 149,600,000 kilometres'                     => [$au, new Kilometre(149600000), 0],
            '1 astronomical unit is equal to 0.0000158125 lightyears'                    => [$au, new Lightyear(0.00001581250), 10],
            '1 astronomical unit is equal to 149,597,870,700 metres'                     => [$au, new Metre(149597870700.0), 0],
            '1 astronomical unit is equal to 149,600,000,000,000,000 micrometres'        => [$au, new Micrometre(149600000000000000), 0],
            '1 astronomical unit is equal to 92,960,000 miles'                           => [$au, new Mile(92960000), 0],
            '1 astronomical unit is equal to 149,600,000,000,000 millimetres'            => [$au, new Millimetre(149600000000000), 0],
            '1 astronomical unit is equal to 149,600,000,000,000,000,000 nanometres'     => [$au, new Nanometre(149600000000000000000), 0],
            '1 astronomical unit is equal to 0.0000048481 parsecs'                       => [$au, new Parsec(0.0000048481), 10],
            '1 astronomical unit is equal to 149,600,000,000,000,008,388,608 picometres' => [$au, new Picometre(149600000000000008388608), 0],
            '1 astronomical unit is equal to 163,600,000,000 yard'                       => [$au, new Yard(163600000000), 0],
        ];
    }
}

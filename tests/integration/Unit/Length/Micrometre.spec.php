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
 * Ensure that a micrometre is infact, a micrometre.
 *
 * @covers UnitConverter\Unit\Length\Micrometre
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
class MicrometreSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAMicrometreIsASubmultipleSIUnit()
    {
        $result = (new Micrometre())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $um = new Micrometre();

        yield from [
            '1 micrometre is equal to 0.00000000000000000668459 astronomical units' => [$um, new AstronomicalUnit(0.00000000000000000668459), 23],
            '1 micrometre is equal to 0.0001 centimetres'                           => [$um, new Centimetre(0.0001), 4],
            '1 micrometre is equal to 0.00001 decimetres'                           => [$um, new Decimetre(0.00001), 5],
            '1 micrometre is equal to 0.0000032808 feet'                            => [$um, new Foot(0.0000032808), 10],
            '1 micrometre is equal to 0.00000984252 hands'                          => [$um, new Hand(0.00000984252), 11],
            '1 micrometre is equal to 0.00003937 inches'                            => [$um, new Inch(0.00003937), 8],
            '1 micrometre is equal to 0.000000001 kilometres'                       => [$um, new Kilometre(0.000000001), 9],
            '1 micrometre is equal to 0.0000000000000000000001057 lightyears'       => [$um, new Lightyear(0.0000000000000000000001057), 25],
            '1 micrometre is equal to 0.000001 metres'                              => [$um, new Metre(0.000001), 6],
            '1 micrometre is equal to 1 micrometre'                                 => [$um, new Micrometre(1.0), 0],
            '1 micrometre is equal to 0.000000000621371 miles'                      => [$um, new Mile(0.000000000621371), 15],
            '1 micrometre is equal to 0.001 millimetres'                            => [$um, new Millimetre(0.001), 3],
            '1 micrometre is equal to 1,000 nanometres'                             => [$um, new Nanometre(1000.0), 0],
            '1 micrometre is equal to 0.0000000000000000000000324078 parsecs'       => [$um, new Parsec(0.0000000000000000000000324078), 28],
            '1 micrometre is equal to 1,000,000 picometres'                         => [$um, new Picometre(1000000.0), 0],
            '1 micrometre is equal to 0.0000010936 yard'                            => [$um, new Yard(0.0000010936), 10],
        ];
    }
}

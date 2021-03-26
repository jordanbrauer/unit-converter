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
 * Ensure that a millimetre is infact, a millimetre.
 *
 * @covers UnitConverter\Unit\Length\Millimetre
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
class MillimetreSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAMillimetreIsASubmultipleSIUnit()
    {
        $result = (new Millimetre())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $mm = new Millimetre();

        yield from [
            '1 millimetre is equal to 0.00000000000000668459 astronomical units' => [$mm, new AstronomicalUnit(0.00000000000000668459), 20],
            '1 millimetre is equal to 0.1 centimetres'                           => [$mm, new Centimetre(0.1), 1],
            '1 millimetre is equal to 0.01 decimetres'                           => [$mm, new Decimetre(0.01), 2],
            '1 millimetre is equal to 0.00328084 feet'                           => [$mm, new Foot(0.00328084), 8],
            '1 millimetre is equal to 0.00984252 hands'                          => [$mm, new Hand(0.00984252), 8],
            '1 millimetre is equal to 0.0393701 inches'                          => [$mm, new Inch(0.0393701), 7],
            '1 millimetre is equal to 0.000001 kilometres'                       => [$mm, new Kilometre(0.000001), 6],
            '1 millimetre is equal to 0.000000000000000000106 lightyears'        => [$mm, new Lightyear(0.000000000000000000106), 21],
            '1 millimetre is equal to 0.001 metres'                              => [$mm, new Metre(0.001), 3],
            '1 millimetre is equal to 1,000 micrometres'                         => [$mm, new Micrometre(1000.0), 0],
            '1 millimetre is equal to 0.00000062137 miles'                       => [$mm, new Mile(0.00000062137), 11],
            '1 millimetre is equal to 1 millimetre'                              => [$mm, new Millimetre(1.0), 0],
            '1 millimetre is equal to 1,000,000 nanometres'                      => [$mm, new Nanometre(1000000.0), 0],
            '1 millimetre is equal to 0.0000000000000000000324078 parsecs'       => [$mm, new Parsec(0.0000000000000000000324078), 25],
            '1 millimetre is equal to 1,000,000,000 picometres'                  => [$mm, new Picometre(1000000000.0), 0],
            '1 millimetre is equal to 0.00109361 yard'                           => [$mm, new Yard(0.00109361), 8],
        ];
    }
}

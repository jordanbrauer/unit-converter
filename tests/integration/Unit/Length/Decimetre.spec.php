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
 * Ensure that a decimetre is infact, a decimetre.
 *
 * @covers UnitConverter\Unit\Length\Decimetre
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
class DecimetreSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatADecimetreIsASubmultipleSIUnit()
    {
        $result = (new Decimetre())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $dm = new Decimetre();

        yield from [
            '1 decimetre is equal to 0.000000000000668459 astronomical units' => [$dm, new AstronomicalUnit(0.000000000000668459), 18],
            '1 decimetre is equal to 10 centimetres'                          => [$dm, new Centimetre(10.0), 0],
            '1 decimetre is equal to 1 decimetres'                            => [$dm, new Decimetre(1.0), 0],
            '1 decimetre is equal to 0.328084 feet'                           => [$dm, new Foot(0.328084), 6],
            '1 decimetre is equal to 0.984252 hands'                          => [$dm, new Hand(0.984252), 6],
            '1 decimetre is equal to 3.93701 inches'                          => [$dm, new Inch(3.93701), 5],
            '1 decimetre is equal to 0.0001 kilometres'                       => [$dm, new Kilometre(0.0001), 4],
            '1 decimetre is equal to 0.00000000000000001057 lightyears'       => [$dm, new Lightyear(0.00000000000000001057), 20],
            '1 decimetre is equal to 0.1 metres'                              => [$dm, new Metre(0.1), 1],
            '1 decimetre is equal to 100,000 micrometres'                     => [$dm, new Micrometre(100000.0), 0],
            '1 decimetre is equal to 0.000062137 miles'                       => [$dm, new Mile(0.000062137), 9],
            '1 decimetre is equal to 100 millimetres'                         => [$dm, new Millimetre(100.0), 0],
            '1 decimetre is equal to 100,000,000 nanometres'                  => [$dm, new Nanometre(100000000.0), 0],
            '1 decimetre is equal to 0.00000000000000000324078 parsecs'       => [$dm, new Parsec(0.00000000000000000324078), 23],
            '1 decimetre is equal to 100,000,000,000 picometres'              => [$dm, new Picometre(100000000000.0), 0],
            '1 decimetre is equal to 0.109361 yard'                           => [$dm, new Yard(0.109361), 6],
        ];
    }
}

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
 * Ensure that a centimetre is infact, a centimetre.
 *
 * @covers UnitConverter\Unit\Length\Centimetre
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
class CentimetreSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatACentimetreIsASubmultipleSIUnit()
    {
        $result = (new Centimetre())->isSubmultipleSiUnit();

        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $cm = new Centimetre();

        yield from [
            '1 centimetre is equal to 0.000000000000066846 astronomical units' => [$cm, new AstronomicalUnit(0.000000000000066846), 18],
            '1 centimetre is equal to 1 centimetre'                            => [$cm, new Centimetre(1.0), 0],
            '1 centimetre is equal to 0.1 decimetres'                          => [$cm, new Decimetre(0.1), 1],
            '1 centimetre is equal to 0.0328084 feet'                          => [$cm, new Foot(0.0328084), 7],
            '1 centimetre is equal to 0.0984252 hands'                         => [$cm, new Hand(0.0984252), 7],
            '1 centimetre is equal to 0.393701 inches'                         => [$cm, new Inch(0.393701), 6],
            '1 centimetre is equal to 0.00001 kilometres'                      => [$cm, new Kilometre(0.00001), 5],
            '1 centimetre is equal to 0.000000000000000001057 lightyears'      => [$cm, new Lightyear(0.000000000000000001057), 21],
            '1 centimetre is equal to 1 metres'                                => [$cm, new Metre(0.01), 2],
            '1 centimetre is equal to 10,000 micrometres'                      => [$cm, new Micrometre(10000.0), 0],
            '1 centimetre is equal to 0.0000062137 miles'                      => [$cm, new Mile(0.0000062137), 10],
            '1 centimetre is equal to 10 millimetres'                          => [$cm, new Millimetre(10.0), 0],
            '1 centimetre is equal to 10,000,000 nanometres'                   => [$cm, new Nanometre(10000000.0), 0],
            '1 centimetre is equal to 0.000000000000000000324078 parsecs'      => [$cm, new Parsec(0.000000000000000000324078), 24],
            '1 centimetre is equal to 10,000,000,000 picometres'               => [$cm, new Picometre(10000000000.0), 0],
            '1 centimetre is equal to 0.0109361 yard'                          => [$cm, new Yard(0.0109361), 7],
        ];
    }
}

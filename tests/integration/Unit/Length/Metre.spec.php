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
 * Ensure that a metre is a metre.
 *
 * @covers UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\ConverterBuilder
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
class MetreSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAMetreIsAnSIUnit()
    {
        $result = (new Metre())->isSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $m = new Metre();

        yield from [
            '1 metre is equal to 0.0000000000066846 astronomical units' => [$m, new AstronomicalUnit(0.0000000000066846), 16],
            '1 metre is equal to 100 centimetres'                       => [$m, new Centimetre(100.0), 0],
            '1 metre is equal to 10 decimetres'                         => [$m, new Decimetre(10.0), 0],
            '1 metre is equal to 3.28084 feet'                          => [$m, new Foot(3.28084), 5],
            '1 metre is equal to 9.84252 hands'                         => [$m, new Hand(9.84252), 5],
            '1 metre is equal to 39.3701 inches'                        => [$m, new Inch(39.3701), 4],
            '1 metre is equal to 0.001 kilometres'                      => [$m, new Kilometre(0.001), 3],
            '1 metre is equal to 0.0000000000000001057 lightyears'      => [$m, new Lightyear(0.0000000000000001057), 19],
            '1 metre is equal to 1 metre'                               => [$m, new Metre(1.0), 0],
            '1 metre is equal to 1,000,000 micrometres'                 => [$m, new Micrometre(1000000.0), 0],
            '1 metre is equal to 0.000621371 miles'                     => [$m, new Mile(0.000621371), 9],
            '1 metre is equal to 1,000 millimetres'                     => [$m, new Millimetre(1000.0), 0],
            '1 metre is equal to 1,000,000,000 nanometres'              => [$m, new Nanometre(1000000000.0), 0],
            '1 metre is equal to 0.0000000000000000324078 parsecs'      => [$m, new Parsec(0.0000000000000000324078), 22],
            '1 metre is equal to 1,000,000,000,000 picometres'          => [$m, new Picometre(1000000000000.0), 0],
            '1 metre is equal to 1.09361 yard'                          => [$m, new Yard(1.09361), 5],
        ];
    }
}

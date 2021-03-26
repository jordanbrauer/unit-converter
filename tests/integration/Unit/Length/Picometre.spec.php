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
 * Ensure that a picometre is infact, a picometre.
 *
 * @covers UnitConverter\Unit\Length\Picometre
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
class PicometreSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAPicometreIsASubmultipleSIUnit()
    {
        $result = (new Picometre())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $pm = new Picometre();

        yield from [
            '1 picometre is equal to 0.00000000000000000000000668459 astronomical units' => [$pm, new AstronomicalUnit(0.00000000000000000000000668459), 29],
            '1 picometre is equal to 0.0000000001 centimetres'                           => [$pm, new Centimetre(0.0000000001), 10],
            '1 picometre is equal to 0.00000000001 decimetres'                           => [$pm, new Decimetre(0.00000000001), 11],
            '1 picometre is equal to 0.0000000000032808 feet'                            => [$pm, new Foot(0.0000000000032808), 16],
            '1 picometre is equal to 0.00000000000984252 hands'                          => [$pm, new Hand(0.00000000000984252), 17],
            '1 picometre is equal to 0.00000000003937 inches'                            => [$pm, new Inch(0.00000000003937), 14],
            '1 picometre is equal to 0.00000000000001 kilometres'                        => [$pm, new Kilometre(0.00000000000001), 15],
            '1 picometre is equal to 0.0000000000000000000000000001057 lightyears'       => [$pm, new Lightyear(0.0000000000000000000000000001057), 31],
            '1 picometre is equal to 0.000000000001 metres'                              => [$pm, new Metre(0.000000000001), 12],
            '1 picometre is equal to 0.000001 micrometres'                               => [$pm, new Micrometre(0.000001), 6],
            '1 picometre is equal to 0.00000000000000062137 miles'                       => [$pm, new Mile(0.00000000000000062137), 20],
            '1 picometre is equal to 0.000000001 millimetres'                            => [$pm, new Millimetre(0.000000001), 9],
            '1 picometre is equal to 0.001 nanometres'                                   => [$pm, new Nanometre(0.001), 3],
            '1 picometre is equal to 0.000000000000000000000000000032408 parsecs'        => [$pm, new Parsec(0.000000000000000000000000000032408), 33],
            '1 picometre is equal to 1 picometre'                                        => [$pm, new Picometre(1.0), 0],
            '1 picometre is equal to 0.0000000000010936 yard'                            => [$pm, new Yard(0.0000000000010936), 16],
        ];
    }
}

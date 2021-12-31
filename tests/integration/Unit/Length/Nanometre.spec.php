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
 * Ensure that a nanometre is infact, a nanometre.
 *
 * @covers UnitConverter\Unit\Length\Nanometre
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
class NanometreSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatANanometreIsASubmultipleSIUnit()
    {
        $result = (new Nanometre())->isSubmultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $nm = new Nanometre();

        yield from [
            '1 nanometre is equal to 0.00000000000000000000668459 astronomical units' => [$nm, new AstronomicalUnit(0.00000000000000000000668459), 26],
            '1 nanometre is equal to 0.0000001 centimetres'                           => [$nm, new Centimetre(0.0000001), 7],
            '1 nanometre is equal to 0.00000001 decimetres'                           => [$nm, new Decimetre(0.00000001), 8],
            '1 nanometre is equal to 0.0000000032808 feet'                            => [$nm, new Foot(0.0000000032808), 13],
            '1 nanometre is equal to 0.00000000984252 hands'                          => [$nm, new Hand(0.00000000984252), 14],
            '1 nanometre is equal to 0.00000003937 inches'                            => [$nm, new Inch(0.00000003937), 11],
            '1 nanometre is equal to 0.000000000001 kilometres'                       => [$nm, new Kilometre(0.000000000001), 12],
            '1 nanometre is equal to 0.0000000000000000000000001057 lightyears'       => [$nm, new Lightyear(0.0000000000000000000000001057), 28],
            '1 nanometre is equal to 0.000000001 metres'                              => [$nm, new Metre(0.000000001), 9],
            '1 nanometre is equal to 0.001 micrometres'                               => [$nm, new Micrometre(0.001), 3],
            '1 nanometre is equal to 0.00000000000062137 miles'                       => [$nm, new Mile(0.00000000000062137), 17],
            '1 nanometre is equal to 0.000001 millimetres'                            => [$nm, new Millimetre(0.000001), 6],
            '1 nanometre is equal to 1 nanometre'                                     => [$nm, new Nanometre(1.0), 0],
            '1 nanometre is equal to 0.0000000000000000000000000324078 parsecs'       => [$nm, new Parsec(0.0000000000000000000000000324078), 31],
            '1 nanometre is equal to 1,000 picometres'                                => [$nm, new Picometre(1000.0), 0],
            '1 nanometre is equal to 0.0000000010936 yard'                            => [$nm, new Yard(0.0000000010936), 13],
        ];
    }
}

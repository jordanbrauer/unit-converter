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
 * Ensure that a kilometre is infact, a kilometre.
 *
 * @covers UnitConverter\Unit\Length\Kilometre
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
class KilometreSpec extends TestCase
{
    /**
     * @test
     */
    public function assertThatAKilometreIsAMultipleSIUnit()
    {
        $result = (new Kilometre())->isMultipleSiUnit();
        $this->assertTrue($result);
        $this->assertIsBool($result);
    }

    public function correctConversions(): Iterator
    {
        $km = new Kilometre();

        yield from [
            '1 kilometre is equal to 0.00000000668459 astronomical units' => [$km, new AstronomicalUnit(0.00000000668459), 14],
            '1 kilometre is equal to 100,000 centimetres'                 => [$km, new Centimetre(100000.0), 0],
            '1 kilometre is equal to 10,000 decimetres'                   => [$km, new Decimetre(10000.0), 0],
            '1 kilometre is equal to 3,280.84 feet'                       => [$km, new Foot(3280.84), 2],
            '1 kilometre is equal to 9,842.52 hands'                      => [$km, new Hand(9842.52), 2],
            '1 kilometre is equal to 39,370.1 inches'                     => [$km, new Inch(39370.1), 1],
            '1 kilometre is equal to 1 kilometre'                         => [$km, new Kilometre(1.0), 0],
            '1 kilometre is equal to 0.0000000000001057 lightyears'       => [$km, new Lightyear(0.0000000000001057), 16],
            '1 kilometre is equal to 1,000 metres'                        => [$km, new Metre(1000.0), 0],
            '1 kilometre is equal to 1,000,000,000 micrometres'           => [$km, new Micrometre(1000000000.0), 0],
            '1 kilometre is equal to 0.621371 miles'                      => [$km, new Mile(0.621371), 6],
            '1 kilometre is equal to 1,000,000 millimetres'               => [$km, new Millimetre(1000000.0), 0],
            '1 kilometre is equal to 1,000,000,000,000 nanometres'        => [$km, new Nanometre(1000000000000.0), 0],
            '1 kilometre is equal to 0.0000000000000324078 parsecs'       => [$km, new Parsec(0.0000000000000324078), 19],
            '1 kilometre is equal to 1,000,000,000,000,000 picometres'    => [$km, new Picometre(1000000000000000.0), 0],
            '1 kilometre is equal to 1,093.61 yard'                       => [$km, new Yard(1093.61), 2],
        ];
    }
}

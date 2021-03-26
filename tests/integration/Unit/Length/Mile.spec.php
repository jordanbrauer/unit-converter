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
 * Ensure that a mile is infact, a mile.
 *
 * @covers UnitConverter\Unit\Length\Mile
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\Formula\Length\Mile\ToMicrometres
 * @uses UnitConverter\Calculator\Formula\Length\Mile\ToMillimetres
 * @uses UnitConverter\Calculator\Formula\Length\Mile\ToNanometres
 * @uses UnitConverter\Calculator\Formula\Length\Mile\ToPicometres
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class MileSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mi = new Mile();

        yield from [
            '1 mile is equal to 0.0000000107578 astronomical units' => [$mi, new AstronomicalUnit(0.0000000107578), 13],
            '1 mile is equal to 160,934 centimetres'                => [$mi, new Centimetre(160934.0), 0],
            '1 mile is equal to 16,093.4 decimetres'                => [$mi, new Decimetre(16093.4), 1],
            '1 mile is equal to 5,280 feet'                         => [$mi, new Foot(5280.0), 0],
            '1 mile is equal to 15,840 hands'                       => [$mi, new Hand(15840.0), 0],
            '1 mile is equal to 63,360 inches'                      => [$mi, new Inch(63360.0), 0],
            '1 mile is equal to 1.60934 kilometres'                 => [$mi, new Kilometre(1.60934), 5],
            '1 mile is equal to 0.000000000000170108 lightyears'    => [$mi, new Lightyear(0.000000000000170108), 18],
            '1 mile is equal to 1,609.344 metres'                   => [$mi, new Metre(1609.344), 3],
            '1 mile is equal to 1,609,000,000 micrometres'          => [$mi, new Micrometre(1609000000), 0],
            '1 mile is equal to 1 mile'                             => [$mi, new Mile(1.0), 0],
            '1 mile is equal to 1,609,000 millimetres'              => [$mi, new Millimetre(1609000), 0],
            '1 mile is equal to 1,609,000,000,000 nanometres'       => [$mi, new Nanometre(1609000000000), 0],
            '1 mile is equal to 0.0000000000000521553 parsecs'      => [$mi, new Parsec(0.0000000000000521553), 19],
            '1 mile is equal to 1,609,000,000,000,000 picometres'   => [$mi, new Picometre(1609000000000000), 0],
            '1 mile is equal to 1,760 yard'                         => [$mi, new Yard(1760.0), 0],
        ];
    }
}

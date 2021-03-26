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
 * Ensure that a foot is infact, a foot.
 *
 * @covers UnitConverter\Unit\Length\Foot
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
class FootSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $ft = new Foot();

        yield from [
            '1 foot is equal to 0.00000000000203746 astronomical units' => [$ft, new AstronomicalUnit(0.00000000000203746), 17],
            '1 foot is equal to 30.48 centimetres'                      => [$ft, new Centimetre(30.48), 2],
            '1 foot is equal to 3.048 decimetres'                       => [$ft, new Decimetre(3.048), 3],
            '1 foot is equal to 1 foot'                                 => [$ft, new Foot(1.0), 0],
            '1 foot is equal to 3 hands'                                => [$ft, new Hand(3.0), 0],
            '1 foot is equal to 12 inches'                              => [$ft, new Inch(12.0), 0],
            '1 foot is equal to 0.0003048 kilometres'                   => [$ft, new Kilometre(0.0003048), 7],
            '1 foot is equal to 0.0000000000000000322174 lightyears'    => [$ft, new Lightyear(0.0000000000000000322174), 22],
            '1 foot is equal to 0.3048 metres'                          => [$ft, new Metre(0.3048), 4],
            '1 foot is equal to 304,800 micrometres'                    => [$ft, new Micrometre(304800.0), 0],
            '1 foot is equal to 0.000189394 miles'                      => [$ft, new Mile(0.000189394), 9],
            '1 foot is equal to 304.8 millimetres'                      => [$ft, new Millimetre(304.8), 1],
            '1 foot is equal to 304,800,000 nanometres'                 => [$ft, new Nanometre(304800000.0), 0],
            '1 foot is equal to 0.0000000000000000098779 parsecs'       => [$ft, new Parsec(0.0000000000000000098779), 22],
            '1 foot is equal to 304,800,000,000 picometres'             => [$ft, new Picometre(304800000000.0), 0],
            '1 foot is equal to 0.333333 yard'                          => [$ft, new Yard(0.333333), 6],
        ];
    }
}

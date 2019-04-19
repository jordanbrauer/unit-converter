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

namespace UnitConverter\Tests\Integration\Unit\Volume;

use UnitConverter\Unit\Volume\CubicMetre;
use UnitConverter\Measure;
use UnitConverter\UnitConverterInterface;
use UnitConverter\Tests\TestCase;

/**
 * Ensure that a cubic metre is a metre that has been cubed.
 *
 * @covers UnitConverter\Unit\Volume\CubicMetre
 * @uses UnitConverter\Unit\Volume\Litre
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
class CubicMetreSpec extends TestCase
{
    const FROM_CUBIC_METRES_TO_LITRES = '1 cubic metre is equal to 1000 litres';

    /**
     * @test
     * @dataProvider correctConversions
     *
     * @param int|float|string $amount
     * @param string $from
     * @param string $to
     * @param int|float|string $expected
     * @return void
     */
    public function assertCorrectConversions(UnitConverterInterface $converter, $amount, string $from, $expected, string $to): void
    {
        $converter = $this->simpleVolumeConverter();
        $actual = $converter->convert($amount)->from($from)->to($to);

        $this->assertEquals($expected, $actual);
    }

    public function correctConversions()
    {
        $simple = $this->simpleVolumeConverter();

        yield from [
            static::FROM_CUBIC_METRES_TO_LITRES => [$simple, 1, 'm3', 1000, 'L'],
        ];
    }
}

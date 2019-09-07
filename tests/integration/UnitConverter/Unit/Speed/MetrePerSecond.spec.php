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

namespace UnitConverter\Tests\Integration\Unit\Speed;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Speed\KilometrePerHour;
use UnitConverter\Unit\Speed\MetrePerSecond;
use UnitConverter\Unit\Speed\MilePerHour;
use UnitConverter\UnitConverter;

/**
 * Ensure that a metre per second is a metre per second.
 *
 * @covers UnitConverter\Unit\Speed\MetrePerSecond
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
class MetrePerSecondSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mps = new MetrePerSecond(1);

        yield from [
            '1 metre per second is equal to 1 metre per second'      => [$mps, new MetrePerSecond(1.0), 0],
            '1 metre per second is equal to 3.6 kilometres per hour' => [$mps, new KilometrePerHour(3.6), 1],
            '1 metre per second is equal to 2.23694 miles per hour'  => [$mps, new MilePerHour(2.23694), 5],
        ];
    }
}

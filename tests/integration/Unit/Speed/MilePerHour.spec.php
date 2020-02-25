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
 * Ensure that a mile per hour is infact, a mile per hour.
 *
 * @covers UnitConverter\Unit\Speed\MilePerHour
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Speed\MetrePerSecond
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
class MilePerHourSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mps = new MilePerHour(1);

        yield from [
            '1 mile per hour is equal to 0.44704 metre per second'    => [$mps, new MetrePerSecond(0.44704), 5],
            '1 mile per hour is equal to 1.60934 kilometres per hour' => [$mps, new KilometrePerHour(1.60934), 5],
            '1 mile per hour is equal to 1.0 mile per hour'           => [$mps, new MilePerHour(1.0), 0],
        ];
    }
}

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
 * Ensure that a kilometre per hour is infact, a kilometre per hour.
 *
 * @covers UnitConverter\Unit\Speed\KilometrePerHour
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
class KilometrePerHourSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $kmh = new KilometrePerHour(1);

        yield from [
            '1 kilometre per hour is equal to 0.277778 metres per second' => [$kmh, new MetrePerSecond(0.277778), 6],
            '1 kilometre per hour is equal to 1 kilometre per hour'       => [$kmh, new KilometrePerHour(1.0), 0],
            '1 kilometre per hour is equal to 0.621371 miles per hour'    => [$kmh, new MilePerHour(0.621372), 6],
        ];
    }
}

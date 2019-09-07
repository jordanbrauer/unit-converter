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

namespace UnitConverter\Tests\Integration\Unit\PlaneAngle;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\PlaneAngle\Degree;
use UnitConverter\Unit\PlaneAngle\Radian;
use UnitConverter\UnitConverter;

/**
 * Ensure that a radian is infact, a radian.
 *
 * @covers UnitConverter\Unit\PlaneAngle\Radian
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\PlaneAngle\Degree
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
class RadianSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $rad = new Radian(1);

        yield from [
            '1 radian is equal to 1 radian'        => [$rad, new Radian(1.0), 0],
            '1 radian is equal to 57.2958 degrees' => [$rad, new Degree(57.2958), 4],
        ];
    }
}

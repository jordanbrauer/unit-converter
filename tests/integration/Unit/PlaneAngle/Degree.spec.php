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
 * Ensure that a degree is infact, a degree.
 *
 * @covers UnitConverter\Unit\PlaneAngle\Degree
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
class DegreeSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $deg = new Degree(1);

        yield from [
            '1 degree is equal to 1 degree'         => [$deg, new Degree(1.0), 0],
            '1 degree is equal to 0.0174533 radian' => [$deg, new Radian(0.0174533), 7],
        ];
    }
}

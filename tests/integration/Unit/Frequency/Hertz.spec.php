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

namespace UnitConverter\Tests\Integration\Unit\Frequency;

use Iterator;
use UnitConverter\Tests\TestCase;
use UnitConverter\Unit\Frequency\Gigahertz;
use UnitConverter\Unit\Frequency\Hertz;
use UnitConverter\Unit\Frequency\Kilohertz;
use UnitConverter\Unit\Frequency\Megahertz;
use UnitConverter\Unit\Frequency\Millihertz;
use UnitConverter\Unit\Frequency\Terahertz;
use UnitConverter\UnitConverter;

/**
 * Ensure that a hertz is a hertz.
 *
 * @covers UnitConverter\Unit\Frequency\Hertz
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
class HertzSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $hz = new Hertz(1);

        yield from [
            '1 hertz is equal to 1,000 millihertz'         => [$hz, new Millihertz(1000.0), 0],
            '1 hertz is equal to 1 hertz'                  => [$hz, new Hertz(1.0), 0],
            '1 hertz is equal to 0.001 kilohertz'          => [$hz, new Kilohertz(0.001), 3],
            '1 hertz is equal to 0.000001 megahertz'       => [$hz, new Megahertz(0.000001), 6],
            '1 hertz is equal to 0.000000001 gigahertz'    => [$hz, new Gigahertz(0.000000001), 9],
            '1 hertz is equal to 0.000000000001 terahertz' => [$hz, new Terahertz(0.000000000001), 12],
        ];
    }
}

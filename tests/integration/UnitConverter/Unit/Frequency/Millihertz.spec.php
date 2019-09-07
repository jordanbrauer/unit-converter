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
 * Ensure that a millihertz is infact, a millihertz.
 *
 * @covers UnitConverter\Unit\Frequency\Millihertz
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Unit\Frequency\Hertz
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
class MillihertzSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $mhz = new Millihertz(1);

        yield from [
            '1 millihertz is equal to 1 millihertz'                => [$mhz, new Millihertz(1.0), 0],
            '1 millihertz is equal to 0.001 hertz'                 => [$mhz, new Hertz(0.001), 3],
            '1 millihertz is equal to 0.000001 kilohertz'          => [$mhz, new Kilohertz(0.000001), 6],
            '1 millihertz is equal to 0.000000001 megahertz'       => [$mhz, new Megahertz(0.000000001), 9],
            '1 millihertz is equal to 0.000000000001 gigahertz'    => [$mhz, new Gigahertz(0.000000000001), 12],
            '1 millihertz is equal to 0.000000000000001 terahertz' => [$mhz, new Terahertz(0.000000000000001), 15],
        ];
    }
}

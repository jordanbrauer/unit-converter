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
 * Ensure that a gigahertz is infact, a gigahertz.
 *
 * @covers UnitConverter\Unit\Frequency\Gigahertz
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
class GigahertzSpec extends TestCase
{
    public function correctConversions(): Iterator
    {
        $ghz = new Gigahertz(1);

        yield from [
            '1 gigahertz is equal to 1,000,000,000,000 millihertz' => [$ghz, new Millihertz(1000000000000.0), 0],
            '1 gigahertz is equal to 1,000,000,000 hertz'          => [$ghz, new Hertz(1000000000.0), 0],
            '1 gigahertz is equal to 1,000,000 kilohertz'          => [$ghz, new Kilohertz(1000000.0), 0],
            '1 gigahertz is equal to 1,000 megahertz'              => [$ghz, new Megahertz(1000.0), 0],
            '1 gigahertz is equal to 1 gigahertz'                  => [$ghz, new Gigahertz(1.0), 0],
            '1 gigahertz is equal to 0.001 terahertz'              => [$ghz, new Terahertz(0.001), 3],
        ];
    }
}

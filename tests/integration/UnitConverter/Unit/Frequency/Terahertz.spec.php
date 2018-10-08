<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Integration\Unit\Frequency;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Frequency\Terahertz;
use UnitConverter\Unit\Frequency\Hertz;
use UnitConverter\UnitConverter;

/**
 * Ensure that a terahertz is infact, a terahertz.
 *
 * @covers UnitConverter\Unit\Frequency\Terahertz
 * @uses UnitConverter\Unit\Frequency\Hertz
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class TerahertzSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Hertz(),
                new Terahertz(),
            ]),
            new SimpleCalculator()
        );
    }

    protected function tearDown()
    {
        unset($this->converter);
    }

    /**
     * @test
     */
    public function assert1TerahertzIs1000000000000Hertzs()
    {
        $expected = 1000000000000;
        $actual = $this->converter
            ->convert(1)
            ->from("THz")
            ->to("Hz");

        $this->assertEquals($expected, $actual);
    }
}

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
use UnitConverter\Unit\Frequency\Megahertz;
use UnitConverter\Unit\Frequency\Hertz;
use UnitConverter\UnitConverter;

/**
 * Ensure that a megahertz is infact, a megahertz.
 *
 * @covers UnitConverter\Unit\Frequency\Megahertz
 * @uses UnitConverter\Unit\Frequency\Hertz
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class MegahertzSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Hertz(),
                new Megahertz(),
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
    public function assert1MegahertzIs1000000Hertzs()
    {
        $expected = 1000000;
        $actual = $this->converter
            ->convert(1)
            ->from("MHz")
            ->to("Hz");

        $this->assertEquals($expected, $actual);
    }
}

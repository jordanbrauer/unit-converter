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

namespace UnitConverter\Tests\Integration\Unit\Area;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Area\SquareFoot;
use UnitConverter\Unit\Area\SquareMetre;
use UnitConverter\UnitConverter;

/**
 * Ensure that a square foot is a square foot.
 *
 * @covers UnitConverter\Unit\Area\SquareFoot
 * @uses UnitConverter\Unit\Area\SquareMetre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class SquareFootSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new SquareMetre(),
                new SquareFoot(),
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
    public function assert1SquareFootIs0decimal092903SquareMetres()
    {
        $expected = 0.092903;
        $actual = $this->converter
            ->convert(1, 6)
            ->from("ft2")
            ->to("m2");

        $this->assertEquals($expected, $actual);
    }
}

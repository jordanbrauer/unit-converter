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

namespace UnitConverter\Tests\Integration\Unit\Mass;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Mass\Kilogram;
use UnitConverter\Unit\Mass\Stone;
use UnitConverter\UnitConverter;

/**
 * Ensure that a stone is infact, a stone.
 *
 * @covers UnitConverter\Unit\Mass\Stone
 * @uses UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class StoneSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Kilogram(),
                new Stone(),
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
    public function assert1StoneIs6decimal35029Kilograms()
    {
        $expected = 6.35029;
        $actual = $this->converter
            ->convert(1, 5)
            ->from("st")
            ->to("kg");

        $this->assertEquals($expected, $actual);
    }
}

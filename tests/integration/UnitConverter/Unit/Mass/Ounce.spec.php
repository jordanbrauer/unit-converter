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
use UnitConverter\Unit\Mass\Ounce;
use UnitConverter\UnitConverter;

/**
 * Ensure that a ounce is infact, a ounce.
 *
 * @covers UnitConverter\Unit\Mass\Ounce
 * @uses UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class OunceSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Kilogram(),
                new Ounce(),
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
    public function assert1OunceIs0decimal0283495Kilograms()
    {
        $expected = 0.0283495;
        $actual = $this->converter
            ->convert(1, 7)
            ->from("oz")
            ->to("kg");

        $this->assertEquals($expected, $actual);
    }
}

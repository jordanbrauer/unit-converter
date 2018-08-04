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

namespace UnitConverter\Tests\Integration\Unit\Volume;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Volume\Gallon;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\UnitConverter;

/**
 * Ensure that a U.S. gallon is a U.S. gallon.
 *
 * @covers UnitConverter\Unit\Volume\Gallon
 * @uses UnitConverter\Unit\Volume\Litre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class GallonSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Litre(),
                new Gallon(),
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
    public function assert1GallonIs3decimal78541Litres()
    {
        $expected = 3.78541;
        $actual = $this->converter
            ->convert(1, 5)
            ->from("gal")
            ->to("L");

        $this->assertEquals($expected, $actual);
    }
}

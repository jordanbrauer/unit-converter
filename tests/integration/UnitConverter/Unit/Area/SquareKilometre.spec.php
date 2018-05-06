<?php

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types = 1);

namespace UnitConverter\Tests\Integration\Unit\Area;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Area\SquareMetre;
use UnitConverter\Unit\Area\SquareKilometre;

/**
 * Ensure that a square kilometre is a square kilometre.
 *
 * @covers UnitConverter\Unit\Area\SquareKilometre
 * @uses UnitConverter\Unit\Area\SquareMetre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class SquareKilometreSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new SquareMetre,
                new SquareKilometre,
            )),
            new SimpleCalculator
        );
    }

    protected function tearDown ()
    {
        unset($this->converter);
    }

    /**
     * @test
     */
    public function assert1SquareKilometreIs1000000SquareMetres ()
    {
        $expected = 1000000;
        $actual = $this->converter
            ->convert(1)
            ->from("km2")
            ->to("m2")
            ;

        $this->assertEquals($expected, $actual);
    }
}

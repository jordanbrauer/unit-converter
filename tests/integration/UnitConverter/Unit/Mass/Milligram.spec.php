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

namespace UnitConverter\Tests\Integration\Unit\Mass;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Mass\Kilogram;
use UnitConverter\Unit\Mass\Milligram;

/**
 * Ensure that a milligram is infact, a milligram.
 *
 * @covers UnitConverter\Unit\Mass\Milligram
 * @uses UnitConverter\Unit\Mass\Kilogram
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class MilligramSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Kilogram,
                new Milligram,
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
    public function assert1MilligramIs0decimal000001Kilograms ()
    {
        $expected = 0.000001;
        $actual = $this->converter
            ->convert(1, 6)
            ->from("mg")
            ->to("kg")
            ;

        $this->assertEquals($expected, $actual);
    }
}

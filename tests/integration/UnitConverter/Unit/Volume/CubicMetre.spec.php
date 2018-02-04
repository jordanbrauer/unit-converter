<?php declare(strict_types = 1);

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
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\Unit\Volume\CubicMetre;

/**
 * Ensure that a cubic metre is a metre that has been cubed.
 *
 * @covers UnitConverter\Unit\Volume\CubicMetre
 * @uses UnitConverter\Unit\Volume\Litre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class CubicMetreSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Litre,
                new CubicMetre,
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
    public function assert1CubicMetreIs1000Litres ()
    {
        $expected = 1000;
        $actual = $this->converter
            ->convert(1)
            ->from("m3")
            ->to("L")
            ;

        $this->assertEquals($expected, $actual);
    }
}

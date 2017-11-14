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

namespace UnitConverter\Tests\Integration\Unit\Length;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\Length\Nanometre;

/**
 * Ensure that a nanometre is infact, a nanometre.
 *
 * @covers UnitConverter\Unit\Length\Nanometre
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class NanometreSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Metre,
                new Nanometre,
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
    public function assert1NanometreIs0decimal000000001Metres ()
    {
        $expected = 0.000000001;
        $actual = $this->converter
            ->convert(1, 9)
            ->from("nm")
            ->to("m")
            ;

        $this->assertEquals($expected, $actual);
    }
}

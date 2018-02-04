<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Integration\Unit\Length;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\Length\Decimetre;

/**
 * Ensure that a decimetre is infact, a decimetre.
 *
 * @covers UnitConverter\Unit\Length\Decimetre
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class DecimetreSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Metre,
                new Decimetre,
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
    public function assert1DecimetreIs0decimal1Metres ()
    {
        $expected = 0.1;
        $actual = $this->converter
            ->convert(1)
            ->from("dm")
            ->to("m")
            ;

        $this->assertEquals($expected, $actual);
    }
}

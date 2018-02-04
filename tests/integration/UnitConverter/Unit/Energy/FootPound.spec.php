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

namespace UnitConverter\Tests\Integration\Unit\Energy;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Energy\Joule;
use UnitConverter\Unit\Energy\FootPound;

/**
 * Ensure that a calorie is infact, a calorie.
 *
 * @covers UnitConverter\Unit\Energy\FootPound
 * @uses UnitConverter\Unit\Energy\Joule
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class FootPoundSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Joule,
                new FootPound,
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
    public function assert1FootPoundIs1decimal35582Joules ()
    {
        $expected = 1.35582;
        $actual = $this->converter
            ->convert(1, 5)
            ->from("ft lbf")
            ->to("J")
            ;

        $this->assertEquals($expected, $actual);
    }
}

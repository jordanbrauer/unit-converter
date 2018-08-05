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

namespace UnitConverter\Tests\Integration\Unit\Length;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\Length\Inch;

/**
 * Ensure that an inch is infact, an inch.
 *
 * @covers UnitConverter\Unit\Length\Inch
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class InchSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Metre,
                new Inch,
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
    public function assert1InchIs0decimal0254Metres ()
    {
        $expected = 0.0254;
        $actual = $this->converter
            ->convert(1, 4)
            ->from("in")
            ->to("m")
            ;

        $this->assertEquals($expected, $actual);
    }
}

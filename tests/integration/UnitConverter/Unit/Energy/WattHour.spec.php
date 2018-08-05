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

namespace UnitConverter\Tests\Integration\Unit\Energy;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Energy\Joule;
use UnitConverter\Unit\Energy\WattHour;

/**
 * Ensure that a joule is infact, a joule.
 *
 * @covers UnitConverter\Unit\Energy\WattHour
 * @uses UnitConverter\Unit\Energy\Joule
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class WattHourSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Joule,
                new WattHour,
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
    public function assert1WattHourIs3600decimal0054468Joules ()
    {
        $expected = 3600.0054468;
        $actual = $this->converter
            ->convert(1, 7)
            ->from("Wh")
            ->to("J")
            ;

        $this->assertEquals($expected, $actual);
    }
}

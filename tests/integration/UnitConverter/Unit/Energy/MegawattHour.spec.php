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
use UnitConverter\Unit\Energy\MegawattHour;

/**
 * Ensure that a joule is infact, a joule.
 *
 * @covers UnitConverter\Unit\Energy\MegawattHour
 * @uses UnitConverter\Unit\Energy\Joule
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 */
class MegawattHourSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Joule,
                new MegawattHour,
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
    public function assert1MegawattHourIs3600005446decimal8Joules ()
    {
        $expected = 3600005446.8;
        $actual = $this->converter
            ->convert(1)
            ->from("MWh")
            ->to("J")
            ;

        $this->assertEquals($expected, $actual);
    }
}

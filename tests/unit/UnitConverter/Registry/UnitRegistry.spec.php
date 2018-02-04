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

namespace UnitConverter\Tests\Unit\Registry;

use PHPUnit\Framework\TestCase;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\UnitInterface;
use UnitConverter\Unit\AbstractUnit;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\Length\Millimetre;

/**
 * @coversDefaultClass UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\Length\Inch
 * @uses UnitConverter\Unit\Length\Centimetre
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\Length\Millimetre
 */
class UnitRegistrySpec extends TestCase
{
    protected function setUp ()
    {
        $this->registry = new UnitRegistry(array(
            new Centimetre,
            new Inch,
        ));
    }

    protected function tearDown ()
    {
        unset($this->registry);
    }

    /**
     * @test
     * @covers ::isMeasurementRegistered
     */
    public function assertMeasurementIsRegistered ()
    {
        $this->assertTrue($this->registry->isMeasurementRegistered("length"));
        $this->assertFalse($this->registry->isMeasurementRegistered("saiyanPower"));
    }

    /**
     * @test
     * @covers ::isUnitRegistered
     */
    public function assertUnitIsRegistered ()
    {
        $this->assertTrue($this->registry->isUnitRegistered("cm"));
        $this->assertFalse($this->registry->isUnitRegistered("yd"));
    }

    /**
     * @test
     * @covers ::loadUnit
     */
    public function assertUnitObjectIsLoaded ()
    {
        $actual = $this->registry->loadUnit("cm");
        $expected = UnitInterface::class;

        $this->assertInstanceOf($expected, $actual);
    }

    /**
     * @test
     * @coversNothing
     */
    public function assertOutOfBoundsExceptionIsThrownForUnregisteredUnits ()
    {
        $this->expectException("UnitConverter\\Exception\\UnknownUnitOfMeasureException");
        $this->registry->loadUnit("yd");
    }

    /**
     * @test
     * @covers ::listMeasurements
     */
    public function assertListMeasurementsMethodReturnsArray ()
    {
        $actual = $this->registry->listMeasurements();
        $expected = array(
            "length",
            "area",
            "volume",
            "mass",
            "speed",
            "plane_angle",
            "temperature",
            "pressure",
            "time",
            "energy",
        );

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("array", $actual);
        $this->assertTrue((count($actual) > 0));
    }

    /**
     * @test
     * @covers ::listUnits
     */
    public function assertListUnitsMethodReturnsArray ()
    {
        $actual = $this->registry->listUnits();
        $expected = array(
            "cm",
            "in",
        );

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("array", $actual);
        $this->assertTrue((count($actual) > 0));
    }

    /**
     * @test
     * @covers ::registerMeasurement
     * @covers ::registerMeasurements
     */
    public function assertRegisterMeasurementMethodsAddItemsToUnitRegistry ()
    {
        $this->assertFalse($this->registry->isMeasurementRegistered("data"));
        $this->assertFalse($this->registry->isMeasurementRegistered("saiyanPower"));
        $this->assertFalse($this->registry->isMeasurementRegistered("funniness"));

        $this->registry->registerMeasurement("data");
        $this->registry->registerMeasurements(["saiyanPower", "funniness"]);

        $this->assertTrue($this->registry->isMeasurementRegistered("data"));
        $this->assertTrue($this->registry->isMeasurementRegistered("saiyanPower"));
        $this->assertTrue($this->registry->isMeasurementRegistered("funniness"));
    }

    /**
     * @test
     * @covers ::registerUnit
     * @covers ::registerUnits
     */
    public function assertRegisterUnitMethodsAddItemsToUnitRegistry ()
    {
        $this->assertFalse($this->registry->isUnitRegistered("sP"));
        $this->assertFalse($this->registry->isUnitRegistered("m"));
        $this->assertFalse($this->registry->isUnitRegistered("mm"));

        $this->registry->registerUnit(new class extends AbstractUnit {
            protected function configure () : void
            {
                $this
                    ->setName("saiyanPower")
                    ->setSymbol("sP")
                    ->setUnitOf("energy")
                    ->setBase(self::class)
                    ->setUnits(9001)
                    ;
            }
        });
        $this->registry->registerUnits([new Metre, new Millimetre]);

        $this->assertTrue($this->registry->isUnitRegistered("sP"));
        $this->assertTrue($this->registry->isUnitRegistered("m"));
        $this->assertTrue($this->registry->isUnitRegistered("mm"));
    }

    /**
     * @test
     * @coversNothing
     */
    public function assertRegisteringUnitsUnderUnknownMeasurementsThrowsOutOfBoundsException ()
    {
        $this->expectException("UnitConverter\\Exception\\UnknownMeasurementTypeException");
        $this->registry->registerUnit(new class extends AbstractUnit {
            protected function configure () : void
            {
                $this
                    ->setName("testtt")
                    ->setSymbol("Tst")
                    ->setUnitOf("NO EXIST LOL")
                    ->setBase(self::class)
                    ->setUnits(1)
                    ;
            }
        });
    }

    /**
     * @test
     * @covers ::unregisterMeasurement
     * @covers ::unregisterMeasurements
     */
    public function assertUnregisterMeasurementMethodsRemoveItemsFromUnitRegistry ()
    {
        $this->assertTrue($this->registry->isMeasurementRegistered("length"));
        $this->assertTrue($this->registry->isMeasurementRegistered("mass"));
        $this->assertTrue($this->registry->isMeasurementRegistered("volume"));

        $this->registry->unregisterMeasurement("length");
        $this->registry->unregisterMeasurements(array("mass", "volume"));

        $this->assertFalse($this->registry->isMeasurementRegistered("length"));
        $this->assertFalse($this->registry->isMeasurementRegistered("mass"));
        $this->assertFalse($this->registry->isMeasurementRegistered("volume"));
    }

    /**
     * @test
     * @coversNothing
     */
    public function assertUnregisteringUnknownMeasurementsThrowsOutOfBoundsException ()
    {
        $this->expectException("UnitConverter\\Exception\\UnknownMeasurementTypeException");
        $this->registry->unregisterMeasurement("NOT REAL");
    }

    /**
     * @test
     * @covers ::unregisterUnit
     * @covers ::unregisterUnits
     */
    public function assertUnregisterUnitMethodsRemoveItemsFromUnitRegistry ()
    {
        $this->assertTrue($this->registry->isUnitRegistered("cm"));
        $this->assertTrue($this->registry->isUnitRegistered("in"));

        $this->registry->unregisterUnit("cm");
        $this->registry->unregisterUnits(array("in"));

        $this->assertFalse($this->registry->isUnitRegistered("cm"));
        $this->assertFalse($this->registry->isUnitRegistered("in"));
    }

    /**
     * @test
     * @coversNothing
     */
    public function assertUnregisteringUnknownUnitsThrowsOutOfBoundsException ()
    {
        $this->expectException("UnitConverter\\Exception\\UnknownUnitOfMeasureException");
        $this->registry->unregisterUnit("nOtREal");
    }
}

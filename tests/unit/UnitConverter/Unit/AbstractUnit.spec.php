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

namespace UnitConverter\Tests\Unit\Unit;

use PHPUnit\Framework\TestCase;
use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\Unit\Length\Metre;

/**
 * @coversDefaultClass UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\Length\Inch
 */
class AbstractUnitSpec extends TestCase
{
    protected function setUp ()
    {
        $this->unit = new class extends AbstractUnit
        {
            protected $name = "saiyan power";
            protected $symbol = "sP";
            protected $scientificSymbol = "Ω·m";
            protected $unitOf = Measure::LENGTH;
            protected $base = Metre::class;
            protected $units = 9001;
        };
    }

    protected function tearDown ()
    {
        unset($this->unit);
    }

    /**
     * @test
     * @covers ::setName
     * @covers ::getName
     */
    public function assertGetNameSetNameMethodsCanReadAndWriteToUnitName ()
    {
        $this->unit->setName("test set");
        $actual = $this->unit->getName();

        $this->assertEquals("test set", $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::setSymbol
     * @covers ::getSymbol
     */
    public function assertGetSymbolSetSymbolMethodsCanReadAndWriteToUnitSymbol ()
    {
        $this->unit->setSymbol("tS");
        $actual = $this->unit->getSymbol();

        $this->assertEquals("tS", $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::setScientificSymbol
     * @covers ::getScientificSymbol
     */
    public function assertGetScientificSymbolSetScientificSymbolMethodsCanReadAndWriteToUnitScientificSymbol ()
    {
        $this->unit->setScientificSymbol("ft³");
        $actual = $this->unit->getScientificSymbol();

        $this->assertEquals("ft³", $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::setUnitOf
     * @covers ::getUnitOf
     */
    public function assertGetUnitOfSetUnitOfMethodsCanReadAndWriteToUnitUnitOf ()
    {
        $this->unit->setUnitOf(Measure::ENERGY);
        $actual = $this->unit->getUnitOf();

        $this->assertEquals(Measure::ENERGY, $actual);
        $this->assertInternalType("string", $actual);
    }

    /**
     * @test
     * @covers ::setBase
     * @covers ::getBase
     */
    public function assertGetBaseSetBaseMethodsCanReadAndWriteToUnitBase ()
    {
        $this->unit->setBase(new Inch);
        $actual = $this->unit->getBase();

        $this->assertInstanceOf(Inch::class, $actual);
        $this->assertInternalType("object", $actual);
    }

    /**
     * @test
     * @covers ::setUnits
     * @covers ::getUnits
     */
    public function assertGetUnitsSetUnitsMethodsCanReadAndWriteToUnitUnits ()
    {
        $this->unit->setUnits(69);
        $actual = $this->unit->getUnits();

        $this->assertEquals(69, $actual);
        $this->assertInternalType("float", $actual);
    }
}

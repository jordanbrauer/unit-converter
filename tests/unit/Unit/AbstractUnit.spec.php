<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Unit\Unit;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\Formula\NullFormula;
use UnitConverter\Exception\BadUnit;
use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\Unit\Length\Metre;

/**
 * @coversDefaultClass UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Exception\BadUnit
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\Length\Inch
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\NullFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\BinaryCalculator
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 * @uses UnitConverter\UnitConverter
 */
class AbstractUnitSpec extends TestCase
{
    const RESULT_SAIYAN_POWER_TO_INCHES = 354370.08;

    protected function setUp(): void
    {
        $this->registryKey = Measure::LENGTH.".sP";
        $this->unit = new class() extends AbstractUnit {
            protected $name = "saiyan power";

            protected $symbol = "sP";

            protected $scientificSymbol = "Ω·m";

            protected $unitOf = Measure::LENGTH;

            protected $base = Metre::class;

            protected $units = 9001;
        };
    }

    protected function tearDown(): void
    {
        unset($this->registryKey, $this->unit);
    }

    /**
     * @test
     * @covers ::addFormulae
     * @covers ::getFormulaFor
     * @return void
     */
    public function assertAddingFormulaAndGettingFormulaForMeasurement(): void
    {
        $this->unit->addFormulae([
            "F"  => NullFormula::class,
            "U"  => NullFormula::class,
            "B"  => NullFormula::class,
            "A"  => NullFormula::class,
            "R"  => NullFormula::class,
            "sP" => NullFormula::class,
        ]);

        $formula = $this->unit->getFormulaFor($this->unit);

        $this->assertInstanceOf(NullFormula::class, $formula);
    }

    /**
     * @test
     * @covers ::as
     * @return void
     */
    public function assertAsUnitConversationWorkForSameUnits()
    {
        $this->assertEquals(1, (new Inch(1))->as(new Inch()));
        $this->assertEquals(2, (new Inch(2))->as(new Inch()));
    }

    /**
     * @test
     * @covers ::getBaseUnits
     * @return void
     */
    public function assertBaseUnitsAreAccessible(): void
    {
        $baseUnits = $this->unit->getBaseUnits();

        $this->assertEquals(1, $baseUnits);
    }

    /**
     * @test
     * @covers ::setBase
     * @covers ::getBase
     */
    public function assertGetBaseSetBaseMethodsCanReadAndWriteToUnitBase()
    {
        $this->unit->setBase(new Inch());
        $actual = $this->unit->getBase();

        $this->assertInstanceOf(Inch::class, $actual);
        $this->assertIsObject($actual);
    }

    /**
     * @test
     * @covers ::setName
     * @covers ::getName
     */
    public function assertGetNameSetNameMethodsCanReadAndWriteToUnitName()
    {
        $this->unit->setName("test set");
        $actual = $this->unit->getName();

        $this->assertEquals("test set", $actual);
        $this->assertIsString($actual);
    }

    /**
     * @test
     * @covers ::getRegistryKey
     */
    public function assertGetRegistryKeyMethodCanReadFromUnits()
    {
        $actual = $this->unit->getRegistryKey();

        $this->assertEquals($this->registryKey, $actual);
        $this->assertIsString($actual);
    }

    /**
     * @test
     * @covers ::setScientificSymbol
     * @covers ::getScientificSymbol
     */
    public function assertGetScientificSymbolSetScientificSymbolMethodsCanReadAndWriteToUnitScientificSymbol()
    {
        $this->unit->setScientificSymbol("ft³");
        $actual = $this->unit->getScientificSymbol();

        $this->assertEquals("ft³", $actual);
        $this->assertIsString($actual);
    }

    /**
     * @test
     * @covers ::setSymbol
     * @covers ::getSymbol
     */
    public function assertGetSymbolSetSymbolMethodsCanReadAndWriteToUnitSymbol()
    {
        $this->unit->setSymbol("tS");
        $actual = $this->unit->getSymbol();

        $this->assertEquals("tS", $actual);
        $this->assertIsString($actual);
    }

    /**
     * @test
     * @covers ::addFormula
     * @covers ::getFormulaFor
     * @return void
     */
    public function assertGettingFormulaForUnregisteredUnitThrowsBadUnitFormulaException(): void
    {
        $this->markTestSkipped('Will come back to this one.');
        $this->expectException(BadUnit::class);
        $this->expectExceptionCode(BadUnit::ERROR_SELF_CONVERSION_FORMULA);
        $this->unit->addFormula("💩", NullFormula::class);
        $this->unit->getFormulaFor($this->unit);
    }

    /**
     * @test
     * @covers ::addFormula
     * @covers ::getFormulaFor
     * @return void
     */
    public function assertGettingFormulaWhileNoneExistReturnsNull(): void
    {
        $this->unit->addFormula("sP", NullFormula::class);

        $formula = $this->unit->getFormulaFor($this->unit);

        $this->assertInstanceOf(NullFormula::class, $formula);
    }

    /**
     * @test
     * @covers ::setUnitOf
     * @covers ::getUnitOf
     */
    public function assertGetUnitOfSetUnitOfMethodsCanReadAndWriteToUnitUnitOf()
    {
        $this->unit->setUnitOf(Measure::ENERGY);
        $actual = $this->unit->getUnitOf();

        $this->assertEquals(Measure::ENERGY, $actual);
        $this->assertIsString($actual);
    }

    /**
     * @test
     * @covers ::setUnits
     * @covers ::getUnits
     */
    public function assertGetUnitsSetUnitsMethodsCanReadAndWriteToUnitUnits()
    {
        $this->unit->setUnits(69);
        $actual = $this->unit->getUnits();

        $this->assertEquals(69, $actual);
        $this->assertIsFloat($actual);
    }

    /**
     * @test
     * @covers ::setValue
     * @covers ::getValue
     * @return void
     */
    public function assertGetValueSetValueMethodsCanReadAndWriteToUnitValue(): void
    {
        $default = $this->unit->getValue();

        $this->assertIsInt($default);
        $this->assertEquals(1, $default);
        $this->assertSame(1, $default);

        $this->unit->setValue(69);

        $actual = $this->unit->getValue();

        $this->assertIsInt($actual);
        $this->assertNotEquals($default, $actual);
        $this->assertEquals(69, $actual);
        $this->assertSame(69, $actual);
    }

    /**
     * @test
     * @covers ::isMultipleSiUnit
     */
    public function assertNonSiMultipleUnitsReturnFalseWhenChecking()
    {
        $result = $this->unit->isMultipleSiUnit();
        $this->assertFalse($result);
        $this->assertIsBool($result);
    }

    /**
     * @test
     * @covers ::isSubmultipleSiUnit
     */
    public function assertNonSiSubmultipleUnitsReturnFalseWhenChecking()
    {
        $result = $this->unit->isSubmultipleSiUnit();
        $this->assertFalse($result);
        $this->assertIsBool($result);
    }

    /**
     * @test
     * @covers ::isSiUnit
     */
    public function assertNonSiUnitsReturnFalseWhenChecking()
    {
        $result = $this->unit->isSiUnit();
        $this->assertFalse($result);
        $this->assertIsBool($result);
    }

    /**
     * @test
     * @covers ::__toString
     * @return void
     */
    public function assertStringValueOfUnitsIsTheSymbolWithoutNumericValue(): void
    {
        $this->assertSame($this->unit->getScientificSymbol(), (string) $this->unit);
    }

    /**
     * @test
     * @covers ::as
     * @return void
     */
    public function assertUnitCanActAsAnotherUnit(): void
    {
        $expected = 9001.0;
        $actual = $this->unit->as(new Metre());

        $this->assertIsFloat($actual);
        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     * @covers ::as
     * @return void
     */
    public function assertUnitCanActAsAnotherUnitWithBinaryPrecision(): void
    {
        $expected = (string) self::RESULT_SAIYAN_POWER_TO_INCHES;
        $actual = $this->unit->as(new Inch(), 2, true);

        $this->assertIsString($actual);
        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     * @covers ::as
     * @return void
     */
    public function assertUnitCanActAsAnotherUnitWithPrecision(): void
    {
        $expected = self::RESULT_SAIYAN_POWER_TO_INCHES;
        $actual = $this->unit->as(new Inch(1), 2);

        $this->assertIsFloat($actual);
        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
    }
}

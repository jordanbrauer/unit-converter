<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Unit;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\ConverterBuilder;
use UnitConverter\Exception\BadUnit;
use UnitConverter\Measure;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\UnitConverter;

/**
 * @coversDefaultClass UnitConverter\UnitConverter
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\Length\Centimetre
 * @uses UnitConverter\Unit\Length\Inch
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class UnitConverterSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Centimetre(),
                new Inch(),
            ]),
            new SimpleCalculator()
        );
    }

    protected function tearDown()
    {
        unset($this->converter);
    }

    /**
     * @test
     * @covers ::convert
     * @covers ::from
     * @covers ::to
     * @covers ::calculate
     */
    public function assertCalculateMethodReturnsCorrectCalculation()
    {
        $expected = 2.54; # = (1 * 0.0254) / 0.01
        $actual = $this->converter
            ->convert(1)
            ->from("in")
            ->to("cm");

        $this->assertEquals($expected, $actual);
        $this->assertInternalType("float", $actual);
    }

    /**
     * @test
     * @covers UnitConverter\Exception\BadUnit
     */
    public function assertConversionThrowsUnknownBadUnitExceptionsAtUnknownUnits()
    {
        $this->expectException(BadUnit::class);
        $this->expectExceptionCode(BadUnit::ERROR_UNKNOWN_UNIT);

        $this->converter
            ->convert(1)
            ->from("yd") # any unregistered unit
            ->to("in");
    }

    /**
     * @test
     * @covers ::calculatorExists
     * @return void
     */
    public function assertConverterCanDetermineWhenCalculatorExists(): void
    {
        $this->assertTrue($this->converter->calculatorExists());
    }

    /**
     * @test
     * @covers ::registryExists
     * @return void
     */
    public function assertConverterCanDetermineWhenRegistryExists(): void
    {
        $this->assertTrue($this->converter->registryExists());
    }

    /**
     * @test
     * @covers ::whichCalculator
     * @return void
     */
    public function assertConverterCanDetermineWhichCalculatorIsInUse(): void
    {
        $class = $this->converter->whichCalculator();

        $this->assertInternalType('string', $class);
        $this->assertNotEmpty($class);
        $this->assertInstanceOf(SimpleCalculator::class, (new $class()));
    }

    /**
     * @test
     * @covers ::all
     * @uses \UnitConverter\ConverterBuilder
     * @uses \UnitConverter\Unit\Length\LengthUnit::configure
     * @return void
     */
    public function assertConverterCanReturnAllPossibleConversionsForAGivenUnit(): void
    {
        $symbol = 'cm';
        $measurement = Measure::LENGTH;
        $possibleConversions = $this->getPossibleConversionsFor($measurement, $symbol);
        $results = $this->converter::createBuilder()
            ->addRegistryFor($measurement)
            ->addSimpleCalculator()
            ->build()
            ->convert(180)
            ->from($symbol)
            ->all();

        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertEquals(count($possibleConversions), count($results));

        foreach ($possibleConversions as $possibleConversion) {
            $this->assertArrayHasKey($possibleConversion, $results);
        }
    }

    /**
     * @test
     * @covers ::createBuilder
     */
    public function assertConverterCanReturnBuilder()
    {
        $builder = $this->converter::createBuilder();

        $this->assertInstanceOf(ConverterBuilder::class, $builder);
    }

    /**
     * @test
     * @covers ::setCalculator
     * @return void
     */
    public function assertConverterCanSetNewCalculator(): void
    {
        $calculator = new SimpleCalculator();

        $this->assertNotSame($calculator, $this->converter->getCalculator());

        $this->converter->setCalculator($calculator);

        $this->assertSame($calculator, $this->converter->getCalculator());
    }

    /**
     * @test
     * @covers ::setRegistry
     * @return void
     */
    public function assertConverterCanSetNewRegistry(): void
    {
        $registry = new UnitRegistry();

        $this->assertNotSame($registry, $this->converter->getRegistry());

        $this->converter->setRegistry($registry);

        $this->assertSame($registry, $this->converter->getRegistry());
    }

    /**
     * @test
     * @covers ::getCalculator
     * @return void
     */
    public function assertConverterReturnsCurrentCalculator(): void
    {
        $calculator = $this->converter->getCalculator();

        $this->assertInstanceOf(SimpleCalculator::class, $calculator);
    }

    /**
     * @test
     * @covers ::getRegistry
     * @return void
     */
    public function assertConverterReturnsCurrentRegistry(): void
    {
        $registry = $this->converter->getRegistry();

        $this->assertInstanceOf(UnitRegistry::class, $registry);
        $this->assertEquals(2, count($registry->listUnits()));
    }

    private function getPossibleConversionsFor(string $measurement, string $symbol): array
    {
        return array_filter(array_map(function ($class) use ($symbol) {
            $possibleConversion = (new $class())->getSymbol();
            if ($possibleConversion != $symbol) {
                return $possibleConversion;
            }
        }, Measure::getDefaultUnitsFor($measurement)), function ($item) {
            return $item;
        });
    }
}

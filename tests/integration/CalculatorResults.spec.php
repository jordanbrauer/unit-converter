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

namespace UnitConverter\Tests\Integration;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\UnitConverter;

/**
 * Tests that both the Simlpe and Binary calculator implementations
 * generate the same results, regardless of typing (int/float, or string).
 *
 * @coversNothing
 */
class CalculatorResultsSpec extends TestCase
{
    protected function setUp(): void
    {
        $registry = new UnitRegistry([
            new Centimetre(),
            new Inch(),
        ]);

        $this->simpleConverter = new UnitConverter(
            $registry,
            new SimpleCalculator()
        );

        $this->binaryConverter = new UnitConverter(
            $registry,
            new BinaryCalculator()
        );
    }

    protected function tearDown(): void
    {
        unset($this->simpleConverter, $this->binaryConverter);
    }

    /**
     * @test
     */
    public function assertSimpleAndBinaryCalculatorsProduceSameResult()
    {
        $value = 1;
        $expectedSimpleResult = 2.54;
        $expectedBinaryResult = "2.54";
        $simpleResult = $this->simpleConverter->convert($value)->from("in")->to("cm");
        $binaryResult = $this->binaryConverter->convert("{$value}")->from("in")->to("cm");

        $this->assertEquals($simpleResult, $binaryResult);
        $this->assertSame($expectedSimpleResult, $simpleResult);
        $this->assertSame($expectedBinaryResult, $binaryResult);
    }
}

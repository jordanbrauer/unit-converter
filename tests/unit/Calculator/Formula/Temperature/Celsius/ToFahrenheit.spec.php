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

namespace UnitConverter\Tests\Unit\Calculator\Formula\Temperature\Celsius;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\Formula\Temperature\Celsius\ToFahrenheit;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;

/**
 * @coversDefaultClass UnitConverter\Calculator\Formula\Temperature\Celsius\ToFahrenheit
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\Length\Centimetre
 * @uses UnitConverter\Unit\Length\Inch
 */
final class ToFahrenheitSpec extends TestCase
{
    protected function setUp(): void
    {
        $this->calculator = new SimpleCalculator();
        $this->formula = new ToFahrenheit($this->calculator);
        $this->fromUnits = (new Inch())->getUnits();
        $this->toUnits = (new Centimetre())->getUnits();
        $this->value = 1;
    }

    protected function tearDown(): void
    {
        unset(
            $this->formula,
            $this->fromUnits,
            $this->toUnits,
            $this->value
        );
    }

    /**
     * @test
     * @covers ::__toString
     * @return void
     */
    public function assertFormulaHasStringRepresentation(): void
    {
        $expected = ToFahrenheit::FORMULA_STRING;
        $actual = (string) $this->formula;

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @covers ::describe
     * @return void
     */
    public function assertGenericToFahrenheitDescribesValuesCorrectly(): void
    {
        $expected = $this->calculator->round(33.80, 2);
        $actual = $this->formula->describe(
            $this->value,
            $this->fromUnits,
            $this->toUnits,
            2
        );

        $this->assertEquals($expected, $actual);
    }
}

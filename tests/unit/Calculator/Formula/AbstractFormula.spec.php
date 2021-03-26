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

namespace UnitConverter\Tests\Unit\Calculator\Formula;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Calculator\Formula\AbstractFormula;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;

/**
 * @coversDefaultClass UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\BinaryCalculator
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\Length\Centimetre
 * @uses UnitConverter\Unit\Length\Inch
 */
final class AbstractFormulaSpec extends TestCase
{
    protected function setUp(): void
    {
        $this->formula = new class(new SimpleCalculator()) extends AbstractFormula {
            const FORMULA_TEMPLATE = '%s';

            public function describe($value, $fromUnits, $toUnits, int $precision = null)
            {
                $this->plugVariables($value);

                return $value;
            }

            /**
             * NOTE: test method only!!!!
             *
             * @return null|CalculatorInterface
             */
            public function getCalculator()
            {
                return $this->calculator;
            }
        };
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
     * @covers ::setCalculator
     * @return void
     */
    public function assertCalculatorsCanBeOverriden(): void
    {
        $calculator = new BinaryCalculator();

        $this->formula->setCalculator($calculator);

        $this->assertSame($calculator, $this->formula->getCalculator());
    }

    /**
     * @test
     * @covers ::plugVariables
     * @covers ::__toString
     * @return void
     */
    public function assertVariablesArePluggedCorrectly(): void
    {
        $expected = 1;

        $this->formula->describe($expected, 2, 3);

        $this->assertEquals("{$expected}", (string) $this->formula);
    }
}

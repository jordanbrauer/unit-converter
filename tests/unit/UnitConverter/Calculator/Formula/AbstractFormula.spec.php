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

namespace UnitConverter\Tests\Unit\Calculator\Formula;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Calculator\Formula\AbstractFormula;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;

/**
 * @coversDefaultClass UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\Length\Centimetre
 * @uses UnitConverter\Unit\Length\Inch
 */
final class AbstractFormulaSpec extends TestCase
{
    protected function setUp()
    {
        $this->formula = new class() extends AbstractFormula {
            public function describe($value, $fromUnits, $toUnits, int $precision = null)
            {
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

    protected function tearDown()
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
        $this->assertNull($this->formula->getCalculator());

        $calculator = new BinaryCalculator();

        $this->formula->setCalculator($calculator);

        $this->assertSame($calculator, $this->formula->getCalculator());
    }
}

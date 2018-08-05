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

namespace UnitConverter\Tests\Unit;

use PHPUnit\Framework\TestCase;
use UnitConverter\ConverterBuilder;
use UnitConverter\UnitConverter;

/**
 * @coversDefaultClass UnitConverter\ConverterBuilder
 * @uses UnitConverter\ConverterBuilder
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 * @uses UnitConverter\Unit\AbstractUnit
 */
class ConverterBuilderSpec extends TestCase
{
    protected function setUp ()
    {
        $this->builder = new ConverterBuilder();
    }

    protected function tearDown ()
    {
        unset($this->builder);
    }

    /**
     * @test
     * @covers ::build
     * @covers ::addSimpleCalculator
     * @covers ::addDefaultRegistry
     */
    public function assertBuilderReturnsFullyConfiguredConverter ()
    {
        $converter = $this->builder
            ->addSimpleCalculator()
            ->addDefaultRegistry()
            ->build();

        $this->assertInstanceOf(UnitConverter::class, $converter);
    }
}

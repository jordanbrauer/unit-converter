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

namespace UnitConverter\Tests;

use Iterator;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use UnitConverter\Unit\UnitInterface;
use UnitConverter\UnitConverter;

abstract class TestCase extends PHPUnitTestCase
{
    /**
     * @var ConverterBuilder
     */
    protected $builder;

    protected function setUp(): void
    {
        $this->builder = UnitConverter::createBuilder();
    }

    protected function tearDown(): void
    {
        unset($this->builder);
    }

    abstract public function correctConversions(): Iterator;

    /**
     * @test
     * @dataProvider correctConversions
     * @param UnitInterface $from
     * @param UnitInterface $to
     * @param int $precision
     * @return void
     */
    public function assertCorrectConversions(UnitInterface $from, UnitInterface $to, int $precision = null): void
    {
        $this->assertSame($from->getUnitOf(), $to->getUnitOf(), 'Cannot convert units that do not share a measurement');

        $fromClass = get_class($from); // HACK: re-instantiating the unit will make @covers work with data providers
        $from = new $fromClass($from->getValue());
        $expected = $to->getValue();
        $actual = $from->as($to, $precision);

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
    }
}

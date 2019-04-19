<?php

declare(strict_types = 1);

namespace UnitConverter\Tests;

use UnitConverter\Unit\UnitInterface;

trait AssertsCorrectConversions
{
    /**
     * @test
     * @dataProvider correctConversions
     *
     * @param int|float|string $amount
     * @param UnitInterface $from
     * @param int|float|string $expected
     * @param UnitInterface $to
     * @return void
     */
    public function assertCorrectConversions($amount, UnitInterface $from, $expected, UnitInterface $to, int $precision = null): void
    {
        $converter = $this->simpleVolumeConverter();
        $actual = $converter->convert($amount, $precision)->from($from->getSymbol())->to($to->getSymbol());

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
    }
}

<?php

declare(strict_types = 1);

namespace UnitConverter\Tests;

use UnitConverter\Measure;
use UnitConverter\Unit\UnitInterface;
use UnitConverter\UnitConverter;

trait AssertsCorrectConversions
{
    /**
     * @test
     * @dataProvider correctConversions
     * @param int|float|string $amount
     * @param UnitInterface $from
     * @param int|float|string $expected
     * @param UnitInterface $to
     * @return void
     */
    public function assertCorrectConversions($amount, UnitInterface $from, $expected, UnitInterface $to, int $precision = null): void
    {
        $this->assertSame($from->getUnitOf(), $to->getUnitOf(), 'Cannot convert units that do not share a measurement');

        $converter = $this->determineConverter($from);
        $actual = $converter->convert($amount, $precision)->from($from->getSymbol())->to($to->getSymbol());

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
    }

    /**
     * Return the converter for a given unit.
     *
     * @param UnitInterface $from
     * @return UnitConverter
     */
    private function determineConverter(UnitInterface $from): UnitConverter
    {
        switch ($from->getUnitOf()) {
            case Measure::VOLUME:
                return $this->simpleVolumeConverter();
        }
    }
}

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

namespace UnitConverter\Tests\Exception;

use PHPUnit\Framework\TestCase;
use UnitConverter\Exception\BadConverter;

/**
 * @coversDefaultClass UnitConverter\Exception\BadConverter
 * @uses UnitConverter\Exception\BadConverter
 */
final class BadConverterExceptionsSpec extends TestCase
{
    /**
     * @test
     * @covers ::missingCalculator
     */
    public function assertBadConverterHasCodeForMissingCalculator()
    {
        $exception = BadConverter::missingCalculator();

        $this->assertInstanceOf(BadConverter::class, $exception);
        $this->assertEquals(BadConverter::ERROR_MISSING_CALCULATOR, $exception->getCode());
    }

    /**
     * @test
     * @covers ::missingRegistry
     */
    public function assertBadConverterHasCodeForMissingRegistry()
    {
        $exception = BadConverter::missingRegistry();

        $this->assertInstanceOf(BadConverter::class, $exception);
        $this->assertEquals(BadConverter::ERROR_MISSING_REGISTRY, $exception->getCode());
    }
}

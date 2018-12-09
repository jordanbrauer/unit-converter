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
use UnitConverter\Exception\BadMeasurement;

/**
 * @coversDefaultClass UnitConverter\Exception\BadMeasurement
 * @uses UnitConverter\Exception\BadMeasurement
 */
final class BadMeasurementExceptionsSpec extends TestCase
{
    /**
     * @test
     * @covers ::unknown
     */
    public function assertBadMeasurementHasCodeForUnknownUnits()
    {
        $exception = BadMeasurement::unknown('gangster-ness');

        $this->assertInstanceOf(BadMeasurement::class, $exception);
        $this->assertEquals(BadMeasurement::ERROR_UNKNOWN_MEASUREMENT, $exception->getCode());
    }
}

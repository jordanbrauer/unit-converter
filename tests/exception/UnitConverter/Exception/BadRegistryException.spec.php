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
use UnitConverter\Exception\BadRegistry;

/**
 * @coversDefaultClass UnitConverter\Exception\BadRegistry
 * @uses UnitConverter\Exception\BadRegistry
 */
final class BadRegistryExceptionSpec extends TestCase
{
    /**
     * @test
     * @covers ::duplicate
     */
    public function assertBadRegistryHasCodeForMissingForumla()
    {
        $exception = BadRegistry::duplicate('AC/DC');

        $this->assertInstanceOf(BadRegistry::class, $exception);
        $this->assertEquals(BadRegistry::ERROR_DUPLICATE_UNIT, $exception->getCode());
    }

    /**
     * @test
     * @covers ::unknown
     */
    public function assertBadRegistryHasCodeForUnknownUnits()
    {
        $exception = BadRegistry::unknown('cm');

        $this->assertInstanceOf(BadRegistry::class, $exception);
        $this->assertEquals(BadRegistry::ERROR_UNKNOWN_UNIT, $exception->getCode());
    }
}

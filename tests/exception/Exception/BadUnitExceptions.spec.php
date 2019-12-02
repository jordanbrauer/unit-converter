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
use UnitConverter\Exception\BadUnit;

/**
 * @coversDefaultClass UnitConverter\Exception\BadUnit
 * @uses UnitConverter\Exception\BadUnit
 */
final class BadUnitExceptionsSpec extends TestCase
{
    /**
     * @test
     * @covers ::formula
     */
    public function assertBadUnitHasCodeForMissingForumla()
    {
        $exception = BadUnit::formula('AC/DC');

        $this->assertInstanceOf(BadUnit::class, $exception);
        $this->assertEquals(BadUnit::ERROR_SELF_CONVERSION_FORMULA, $exception->getCode());
    }

    /**
     * @test
     * @covers ::scalar
     */
    public function assertBadUnitHasCodeForUnsupportedScalarTypes()
    {
        $exception = BadUnit::scalar('poop');

        $this->assertInstanceOf(BadUnit::class, $exception);
        $this->assertEquals(BadUnit::ERROR_SCALAR_TYPE, $exception->getCode());
    }
}

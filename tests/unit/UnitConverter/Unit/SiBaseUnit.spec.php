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

namespace UnitConverter\Tests\Unit\Unit;

use PHPUnit\Framework\TestCase;
use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\SiBaseUnitInterface;

/**
 * @coversDefaultClass UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\Unit\SiBaseUnitInterface
 * @uses UnitConverter\Unit\Length\Inch
 */
class SiBaseUnitSpec extends TestCase
{
    protected function setUp()
    {
        $this->unit = new class() extends AbstractUnit implements SiBaseUnitInterface {
            protected $name = "saiyan power";

            protected $symbol = "sP";

            protected $scientificSymbol = "Ω·m";

            protected $unitOf = Measure::LENGTH;

            protected $base = Metre::class;

            protected $units = 9001;
        };
    }

    protected function tearDown()
    {
        unset($this->unit);
    }

    /**
     * @test
     * @covers ::isSiUnit
     */
    public function assertSiBaseUnitsAreSiBaseUnitsWhenChecking()
    {
        $result = $this->unit->isSiUnit();
        $this->assertTrue($result);
        $this->assertInternalType("bool", $result);
    }
}

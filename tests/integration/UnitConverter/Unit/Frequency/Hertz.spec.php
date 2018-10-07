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

namespace UnitConverter\Tests\Integration\Unit\Length;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Hertz;
use UnitConverter\UnitConverter;

/**
 * Ensure that a hertz is a hertz.
 *
 * @covers UnitConverter\Unit\Frequency\Hertz
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 */
class HertzSpec extends TestCase
{
	protected function setUp()
	{
		$this->converter = new UnitConverter(
			new UnitRegistry([
								 new Hertz(),
							 ]),
			new SimpleCalculator()
		);
	}

	protected function tearDown()
	{
		unset($this->converter);
	}

	/**
	 * @test
	 */
	public function assert1HertzIs1Hertz()
	{
		$expected = 1;
		$actual = $this->converter
			->convert(1)
			->from("Hz")
			->to("Hz");

		$this->assertEquals($expected, $actual);
	}
}

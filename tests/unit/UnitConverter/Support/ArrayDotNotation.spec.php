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

namespace UnitConverter\Tests\Unit\Support;

use PHPUnit\Framework\TestCase;
use UnitConverter\Support\ArrayDotNotation;
use stdClass;

/**
 * @coversDefaultClass UnitConverter\Support\ArrayDotNotation
 */
class ArrayDotNotationSpec extends TestCase
{
    protected function setUp()
    {
        $this->fake = new class {
            use ArrayDotNotation;
        };
    }

    protected function tearDown()
    {
        unset($this->fake);
    }

    /**
     * @test
     * @covers ::getFromPath
     * @covers ::getPathFromStruct
     * @covers ::getPathFromArray
     * @covers ::getPathFromObject
     * @covers ::defaultValue
     */
    public function assertCanGetWithDotNotation ()
    {
        $arr = ['foo' => [ 'bar' => 'baz']];
        $actual = $this->fake::getFromPath($arr, 'foo.bar');
        $this->assertEquals('baz', $actual);
    }

    /**
     * @test
     * @covers ::pushToPath
     */
    public function assertCanPushWithDotNotation ()
    {
        $arr = ['foo' => [ 'bar' => 'baz']];

        $this->fake->pushToPath($arr, 'foo.bar', 'qux');
        $this->assertEquals('qux', $arr['foo']['bar']);

        $this->fake->pushToPath($arr, 'foo.bar', ['test']);
        $this->assertEquals('test', $arr['foo']['bar'][0]);

        $object = new stdClass;
        $object->baz = 'qux';
        $this->fake->pushToPath($arr, 'foo.bar', $object);
        $this->assertEquals('qux', $arr['foo']['bar']->baz);

        $this->fake->pushToPath($arr, 'baz.qux', true);
        $this->assertTrue($arr['baz']['qux']);

        $this->fake->pushToPath($arr, 'baz.qux', false);
        $this->assertFalse($arr['baz']['qux']);

        $this->fake->pushToPath($arr, 'baz.qux', 10);
        $this->assertSame(10, $arr['baz']['qux']);

        $this->fake->pushToPath($arr, 'baz.qux', -10);
        $this->assertSame(-10, $arr['baz']['qux']);
    }

    /**
     * @test
     * @covers ::popPath
     */
    public function assertCanPopWithDotNotation ()
    {
        $arr = ['foo' => [ 'bar' => 'baz']];
        $this->fake->popPath($arr, 'foo.bar');
        $this->assertFalse(isset($arr['foo']['bar']));
        $this->assertTrue(isset($arr['foo']));
    }

    /**
     * @test
     * @covers ::pathExists
     */
    public function assertCanCheckPathExistsWithDotNotation ()
    {
        $arr = ['foo' => [ 'bar' => 'baz']];
        $this->assertTrue($this->fake->pathExists($arr, 'foo.bar'));
        $this->assertFalse($this->fake->pathExists($arr, 'foo.baz'));
    }
}

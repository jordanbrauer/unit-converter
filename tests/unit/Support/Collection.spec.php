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

namespace UnitConverter\Tests\Unit\Support;

use PHPUnit\Framework\TestCase;
use stdClass;
use UnitConverter\Support\Collection;

/**
 * @coversDefaultClass UnitConverter\Support\Collection
 * @uses UnitConverter\Support\Collection
 * @uses UnitConverter\Support\ArrayDotNotation
 */
class CollectionSpec extends TestCase
{
    /**
     * @test
     * @covers ::count
     */
    public function assertCanBeCounted()
    {
        $c = new Collection([1, 2, 3, 4, 5]);
        $this->assertEquals(5, $c->count());
        $this->assertEquals(5, count($c));
    }

    /**
     * @test
     * @covers ::exists
     */
    public function assertCanCheckPathExistsWithDotNotation()
    {
        $c = new Collection(['foo' => ['bar' => 'baz']]);
        $this->assertTrue($c->exists('foo.bar'));
        $this->assertFalse($c->exists('foo.baz'));
    }

    /**
     * @test
     * @covers ::get
     */
    public function assertCanGetWithDotNotation()
    {
        $c = new Collection(['foo' => ['bar' => 'baz']]);
        $this->assertEquals('baz', $c->get('foo.bar'));
    }

    /**
     * @test
     * @covers ::getIterator
     */
    public function assertCanIterateWithForeach()
    {
        $data = [1 => 'one', 2 => 'two', 3 => 'three'];
        $c = new Collection($data);

        $step = 1;
        foreach ($c as $number => $word) {
            $this->assertEquals($step, $number);
            $this->assertEquals($data[$step], $word);
            $step++;
        }
    }

    /**
     * @test
     * @covers ::pop
     */
    public function assertCanPopWithDotNotation()
    {
        $c = new Collection(['foo' => ['bar' => 'baz']]);
        $c->pop('foo.bar');
        $this->assertFalse(isset($c['foo']['bar']));
        $this->assertTrue(isset($c['foo']));
    }

    /**
     * @test
     * @covers ::push
     */
    public function assertCanPushWithDotNotation()
    {
        $c = new Collection(['foo' => ['bar' => 'baz']]);

        $c->push('foo.bar', 'qux');
        $this->assertEquals('qux', $c['foo']['bar']);

        $c->push('foo.bar', ['test']);
        $this->assertEquals('test', $c['foo']['bar'][0]);

        $object = new stdClass();
        $object->baz = 'qux';
        $c->push('foo.bar', $object);
        $this->assertEquals('qux', $c['foo']['bar']->baz);

        $c->push('baz.qux', true);
        $this->assertTrue($c['baz']['qux']);

        $c->push('baz.qux', false);
        $this->assertFalse($c['baz']['qux']);

        $c->push('baz.qux', 10);
        $this->assertSame(10, $c['baz']['qux']);

        $c->push('baz.qux', -10);
        $this->assertSame(-10, $c['baz']['qux']);
    }

    /**
     * @test
     * @covers ::keys
     */
    public function assertCollectionKeysCanBeFetched()
    {
        $c = new Collection(['foo' => [], 'bar' => [], 'baz' => []]);

        $keys = $c->keys();
        $this->assertEquals(['foo', 'bar', 'baz'], $keys);
        $this->assertIsArray($keys);
    }

    /**
     * @test
     * @covers ::copy
     */
    public function assertDataCanBeCopied()
    {
        $c = new Collection([1, 2, 3]);
        $c2 = $c->copy();

        $this->assertInstanceOf(Collection::class, $c2);
        $this->assertNotSame($c, $c2);
        $this->assertEquals($c, $c2);
    }

    /**
     * @test
     * @covers ::filter
     */
    public function assertDataCanBeFiltered()
    {
        $data = [0, '1', 2, '3', 4];
        $c = new Collection($data);

        for ($i = 0; $i < count($c); $i++) {
            $value = $c[$i];
            if (($value % 2) >= 1) {
                $this->assertIsString($value);
            } else {
                $this->assertIsInt($value);
            }
        }

        $intData = $c->filter(function ($value) {
            return 'integer' === gettype($value);
        });

        $this->assertFalse(empty($intData));
        foreach ($intData as $value) {
            $this->assertIsNotString($value);
            $this->assertIsInt($value);
        }
    }

    /**
     * @test
     * @covers ::jsonSerialize
     */
    public function assertDataCanBeJsonSerialized()
    {
        $data = ['one' => [0.5, 0.5], 'two' => [1, 1], 'three' => [1.5, 1.5]];
        $c = new Collection($data);

        $encoded = json_encode($c);
        $json = '{"one":[0.5,0.5],"two":[1,1],"three":[1.5,1.5]}';
        $this->assertJsonStringEqualsJsonString($json, $encoded);
    }

    /**
     * @test
     * @covers ::map
     */
    public function assertDataCanBeMapped()
    {
        $strData = ['1', '2', '3'];
        $c = new Collection($strData);

        foreach ($strData as $data) {
            $this->assertIsString($data);
            $this->assertIsNotInt($data);
        }

        $intData = $c->map(function ($value) {
            return (int) $value;
        });

        foreach ($intData as $data) {
            $this->assertIsInt($data);
            $this->assertIsNotString($data);
        }
    }

    /**
     * @test
     * @covers ::offsetGet
     */
    public function assertOffsetCanBeGotten()
    {
        $c1 = new Collection([1, 2, 3]);
        $this->assertEquals(1, $c1[0]);
        $this->assertEquals(2, $c1[1]);
        $this->assertEquals(3, $c1[2]);

        $c2 = new Collection([
            'one'   => 1,
            'two'   => 2,
            'three' => 3,
        ]);
        $this->assertEquals(1, $c2['one']);
        $this->assertEquals(2, $c2['two']);
        $this->assertEquals(3, $c2['three']);

        $this->assertEquals(1, $c2->offsetGet('one'));
        $this->assertEquals(2, $c2->offsetGet('two'));
        $this->assertEquals(3, $c2->offsetGet('three'));
    }

    /**
     * @test
     * @covers ::offsetSet
     */
    public function assertOffsetCanBeSet()
    {
        $c = new Collection();

        $c->offsetSet('one', 1);
        $this->assertEquals(1, $c['one']);

        $c->offsetSet('two', 2);
        $this->assertEquals(2, $c['two']);

        $c['three'] = 3;
        $this->assertEquals(3, $c['three']);
    }

    /**
     * @test
     * @covers ::offsetUnset
     */
    public function assertOffsetCanBeUnset()
    {
        $c1 = new Collection([1, 2, 3]);
        $c1->offsetUnset(0);
        $this->assertFalse(isset($c1[0]));

        $c2 = new Collection([
            'one'   => 1,
            'two'   => 2,
            'three' => 3,
        ]);
        $c2->offsetUnset('one');
        $this->assertFalse(isset($c2['one']));
    }

    /**
     * @test
     * @covers ::offsetExists
     */
    public function assertOffsetExists()
    {
        $c1 = new Collection(['lé' => 0, 'test' => 1]);
        $this->assertFalse(empty($c1));
        $this->assertTrue($c1->offsetExists('test'));

        $c2 = new Collection(['one', 'two', 'three']);
        $this->assertFalse(empty($c2));
        $this->assertTrue($c2->offsetExists(2));
    }
}

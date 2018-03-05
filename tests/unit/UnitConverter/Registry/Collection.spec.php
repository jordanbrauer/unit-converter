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

namespace UnitConverter\Tests\Unit\Registry;

use PHPUnit\Framework\TestCase;
use UnitConverter\Registry\Collection;

/**
 * @coversDefaultClass UnitConverter\Registry\Collection
 */
class CollectionSpec extends TestCase
{
    /**
     * @test
     * @covers ::offsetGet
     */
    public function assertOffsetCanBeGotten ()
    {
        $c1 = new Collection([1, 2, 3]);
        $this->assertEquals(1, $c1[0]);
        $this->assertEquals(2, $c1[1]);
        $this->assertEquals(3, $c1[2]);

        $c2 = new Collection([
            'one' => 1,
            'two' => 2,
            'three' => 3,
        ]);
        $this->assertEquals(1, $c2['one']);
        $this->assertEquals(2, $c2['two']);
        $this->assertEquals(3, $c2['three']);
    }

    /**
     * @test
     * @covers ::offsetSet
     */
    public function assertOffsetCanBeSet ()
    {
        $c = new Collection;

        $c->offsetSet('one', 1);
        $this->assertEquals(1, $c['one']);

        $c->offsetSet('two', 2);
        $this->assertEquals(2, $c['two']);
    }

    /**
     * @test
     * @covers ::offsetUnset
     */
    public function assertOffsetCanBeUnset ()
    {
        $c1 = new Collection([1, 2, 3]);
        $c1->offsetUnset(0);
        $this->assertFalse(isset($c1[0]));

        $c2 = new Collection([
            'one' => 1,
            'two' => 2,
            'three' => 3,
        ]);
        $c2->offsetUnset('one');
        $this->assertFalse(isset($c2['one']));
    }

    /**
     * @test
     * @covers ::offsetExists
     */
    public function assertOffsetExists ()
    {
        $c1 = new Collection(['lé' => 0, 'test' => 1]);
        $this->assertFalse(empty($c1));
        $this->assertTrue($c1->offsetExists('test'));

        $c2 = new Collection(['one', 'two', 'three']);
        $this->assertFalse(empty($c2));
        $this->assertTrue($c2->offsetExists(2));
    }

    /**
     * @test
     * @covers ::count
     */
    public function assertCanBeCounted ()
    {
        $c = new Collection([1, 2, 3, 4, 5]);
        $this->assertEquals(5, $c->count());
        $this->assertEquals(5, count($c));
    }

    /**
     * @test
     * @covers ::getIterator
     */
    public function assertCanIterateWithForeach ()
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
     * @covers ::jsonSerialize
     */
    public function assertDataCanBeJsonSerialized ()
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
    public function assertDataCanBeMapped ()
    {
        $strData = ['1', '2', '3'];
        $c = new Collection($strData);

        foreach ($strData as $data) {
            $this->assertInternalType('string', $data);
            $this->assertNotInternalType('int', $data);
        }

        $intData = $c->map(function ($value) {
            return (int) $value;
        });

        foreach ($intData as $data) {
            $this->assertInternalType('int', $data);
            $this->assertNotInternalType('string', $data);
        }
    }

    /**
     * @test
     * @covers ::filter
     */
    public function assertDataCanBeFiltered ()
    {
        $data = [0, '1', 2, '3', 4];
        $c = new Collection($data);

        for ($i = 0; $i < count($c); $i++) {
            $value = $c[$i];
            if (($value % 2) >= 1) {
                $this->assertInternalType('string', $value);
            } else {
                $this->assertInternalType('integer', $value);
            }
        }

        $intData = $c->filter(function ($value) {
            return (gettype($value) === 'integer');
        });

        $this->assertFalse(empty($intData));
        foreach ($intData as $value) {
            $this->assertNotInternalType('string', $value);
            $this->assertInternalType('int', $value);
        }
    }
}

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

namespace UnitConverter\Registry;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

class Collection implements ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    protected $store;

    /**
     * The public constructor for the Collection class.
     *
     * @param UnitInterface[] $store A collection of objects that implement the UnitInterface.
     */
    public function __construct(array $store = null)
    {
        $this->store = $store ?? [];
    }

    public function copy(): Collection
    {
        return clone $this;
    }

    /**
     * Count the elements of this collection.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->store);
    }

    /**
     * Run a filter over each of the items.
     *
     * @param callable|null $callback
     * @return static
     */
    public function filter(callable $callback = null): Collection
    {
        if ($callback) {
            return new static(array_filter($this->store, $callback, ARRAY_FILTER_USE_BOTH));
        }

        return new static(array_filter($this->store));
    }

    /**
     * Retrieve an external iterator
     *
     * @throws Exception
     * @return Traversable|Iterator|Generator
     */
    public function getIterator(): Traversable
    {
        return (function () {
            while (list($key, $val) = each($this->store)) {
                yield $key => $val;
            }
        })();
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_map(function ($value) {
            if ($value instanceof JsonSerializable) {
                return $value->jsonSerialize();
            }

            return $value;
        }, $this->store);
    }

    /**
     * Run a map over each of the items.
     *
     * @param callable $callback
     * @return static
     */
    public function map(callable $callback): Collection
    {
        $offsets = array_keys($this->store);
        $values = array_map($callback, $this->store, $offsets);

        return new static(array_combine($offsets, $values));
    }

    /**
     * Determine if an item exists at an offset.
     *
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->store);
    }

    /**
     * Get an item at a given offset.
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->store[$offset];
    }

    /**
     * Set the item at a given offset.
     *
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->store[] = $value;

            return;
        }

        $this->store[$offset] = $value;
    }

    /**
     * Unset the item at a given offset.
     *
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->store[$offset]);
    }
}

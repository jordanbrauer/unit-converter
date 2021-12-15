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

namespace UnitConverter\Support;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

/**
 * A custom data structure to help perform robust operations on many items.
 *
 * @version 1.1.0
 * @since 0.6.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @internal
 */
final class Collection implements ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    use ArrayDotNotation;

    /**
     * The internal store for an instance of a collection.
     *
     * @var array
     */
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

    /**
     * Return a copy of the collection.
     *
     * @return Collection
     */
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
     * Check if an element exists in an array using dot notation.
     *
     * @param string $path The path to the desired offset, deliminated by dots.
     * @return bool
     */
    public function exists(string $path): bool
    {
        return static::pathExists($this->store, $path);
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
     * Get an item at a given path.
     *
     * @param string $path The path to the desired offset, deliminated by dots.
     * @param mixed $default (optional) A default value to return if none found.
     * @return mixed
     */
    public function get(string $path, $default = null)
    {
        return static::getFromPath($this->store, $path, $default);
    }

    /**
     * Retrieve an external iterator
     *
     * @throws Exception
     * @return Traversable|Iterator|Generator
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->store);
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

    public function keys(): array
    {
        return array_keys($this->store);
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
    #[\ReturnTypeWillChange]
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

    /**
     * Unset an item at a given path.
     *
     * @param string $path The path to the desired offset, deliminated by dots.
     * @return void
     */
    public function pop(string $path): void
    {
        static::popPath($this->store, $path);
    }

    /**
     * Set an item at a given path.
     *
     * @param string $path The path to the desired offset, deliminated by dots.
     * @param mixed $value The value to set for the given path.
     * @return mixed
     */
    public function push(string $path, $value)
    {
        return static::pushToPath($this->store, $path, $value);
    }
}

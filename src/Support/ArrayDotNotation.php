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

use Closure;

/**
 * Provides static methods on the consumer that will allow to access array &
 * object values via dot notation.
 *
 * @version 1.0.0
 * @since 0.8.0
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @internal
 */
trait ArrayDotNotation
{
    /**
     * Get an array or object value using dot notation.
     *
     * @param array|object $struct The structure to retreive a value from.
     * @param string $path The path to the value, in dot notation.
     * @param mixed $default (optional) A default value to return if none found.
     * @return mixed
     */
    public static function getFromPath($struct, string $path, $default = null)
    {
        if (is_array($struct) and isset($struct[$path])) {
            return $struct[$path];
        }

        foreach (explode(".", $path) as $segment) {
            self::getPathFromStruct($struct, $segment, $default);
        }

        return $struct;
    }

    /**
     * Check if an element exists in an array using dot notation.
     *
     * @param array $array The array to retreive a value from.
     * @param string $path The path to the value, in dot notation.
     * @return bool
     */
    public static function pathExists(array $array, string $path): bool
    {
        if (isset($array[$path])) {
            return true;
        }

        foreach (explode(".", $path) as $segment) {
            if (!is_array($array) or !isset($array[$segment])) {
                return false;
            }
            $array = $array[$segment];
        }

        return true;
    }

    /**
     * Unset an array using dot notation.
     *
     * @param array $array The array to retreive a value from.
     * @param string $path The path to the value, in dot notation.
     * @return void
     */
    public static function popPath(array &$array, string $path): void
    {
        $segments = explode(".", $path);

        while (count($segments) > 1) {
            $segment = array_shift($segments);

            if (isset($array[$segment]) and is_array($array[$segment])) {
                $array = & $array[$segment];
            }
        }

        unset($array[array_shift($segments)]);
    }

    /**
     * Set an array value using dot notation.
     *
     * @param array $array The array to retreive a value from.
     * @param string $path The path to the value, in dot notation.
     * @param mixed $value The value to set for the given path.
     * @return mixed
     */
    public static function pushToPath(array &$array, string $path, $value)
    {
        foreach (explode(".", $path) as $segment) {
            $array = &$array[$segment];
        }

        return $array = $value;
    }

    /**
     * Returns the result of an evaluated subject.
     *
     * @param mixed|Closure $subject A value or closure to execute and return.
     * @return mixed|null
     */
    private static function defaultValue($subject = null)
    {
        return ($subject and $subject instanceof Closure)
            ? $subject()
            : $subject;
    }

    /**
     * Build a path in an array for accessing values using dot notation.
     *
     * @param array $array The array that will be traversed.
     * @param int|string $index The index to access the value with.
     * @param mixed $default (optional) A default value that should be returned.
     * @return mixed|null
     */
    private static function getPathFromArray(&$array, $index, $default = null)
    {
        if (!is_array($array)) {
            return;
        }

        if (!isset($array[$index])) {
            return self::defaultValue($default);
        }

        $array = $array[$index];
    }

    /**
     * Build a path on an object for accessing values using dot notation.
     *
     * @param object $object The object that will be traversed.
     * @param string $property The property to access the value with.
     * @param mixed $default (optional) A default value that should be returned.
     * @return mixed|null
     */
    private static function getPathFromObject(&$object, $property, $default = null)
    {
        if (!is_object($object)) {
            return;
        }

        if (!isset($object->{$property})) {
            return self::defaultValue($default);
        }

        $object = $object->{$property};
    }

    /**
     * Wrapper method for all structure types to seek paths from.
     *
     * @param array|object $struct The structure that will be traversed.
     * @param int|string $segment The name of the property to access a value by.
     * @param mixed $default (optional) A default value that should be returned.
     * @return mixed|null
     */
    private static function getPathFromStruct(&$struct, $segment, $default = null)
    {
        return self::getPathFromArray($struct, $segment, $default)
            ?? self::getPathFromObject($struct, $segment, $default);
    }
}

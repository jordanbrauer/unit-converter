<?php declare(strict_types = 1);

namespace UnitConverter\Support;

use Closure;

trait ArrayDotNotation
{
    /**
     * Get an array or object value using dot notation.
     *
     * @param array|stdClass $struct The structure to retreive a value from.
     * @param string $path The path to the value, in dot notation.
     * @param mixed $default (optional) A default value to return if none found.
     * @return mixed
     */
    public static function getFromPath ($struct, string $path, $default = null)
    {
        if (is_array($struct) and isset($struct[$path])) return $struct[$path];

        foreach (explode(".", $path) as $segment) {
            if (is_object($struct)) {
                if (isset($struct->{$segment})) {
                    $struct = $struct->{$segment};
                } else {
                    return ($default and $default instanceof Closure)
                        ? $default()
                        : $default;
                }
            }

            if (is_array($struct)) {
                if (isset($struct[$segment])) {
                    $struct = $struct[$segment];
                } else {
                    return ($default and $default instanceof Closure)
                        ? $default()
                        : $default;
                }
            }
        }

        return $struct;
    }

    /**
     * Set an array value using dot notation.
     *
     * @param array $array The array to retreive a value from.
     * @param string $path The path to the value, in dot notation.
     * @param mixed $value The value to set for the given path.
     * @return mixed
     */
    public static function pushToPath (array &$array, string $path, $value)
    {
        foreach (explode(".", $path) as $segment) {
            $array = &$array[$segment];
        }

        return $array = $value;
    }

    /**
     * Unset an array using dot notation.
     *
     * @param array $array The array to retreive a value from.
     * @param string $path The path to the value, in dot notation.
     * @return void
     */
    public static function popPath (array &$array, string $path): void
    {
        $segments = explode(".", $path);

        while (count($segments) > 1) {
            $segment = array_shift($segments);

            if (isset($array[$segment]) and is_array($array[$segment]))
                $array =& $array[$segment];
        }

        unset($array[array_shift($segments)]);
    }

    /**
     * Check if an element exists in an array using dot notation.
     *
     * @param array $array The array to retreive a value from.
     * @param string $path The path to the value, in dot notation.
     * @return bool
     */
    public static function pathExists (array $array, string $path): bool
    {
        if (isset($array[$path])) return true;

        foreach (explode(".", $path) as $segment) {
            if (!is_array($array) or !isset($array[$segment])) return false;
            $array = $array[$segment];
        }

        return true;
    }
}

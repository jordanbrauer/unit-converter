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

namespace UnitConverter\Exception;

use Exception;

/**
 * Exception to be thrown when the unit registry encounters an issue reading &
 * writing units.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class BadRegistry extends Exception
{
    const ERROR_DUPLICATE_UNIT = 2;

    const ERROR_UNKNOWN_UNIT = 1;

    /**
     * Create a new exception for duplicate units.
     *
     * @param string $symbol The symbol that is offending as a duplicate.
     * @param Exception $previous
     * @return Exception
     */
    public static function duplicate(string $symbol, Exception $previous = null): Exception
    {
        return new self(
            "Unit '{$symbol}' is already registered. Please use a different notation or remove the conflicting unit",
            self::ERROR_DUPLICATE_UNIT,
            $previous
        );
    }

    /**
     * Throw a new exception for an unknown type of unit.
     *
     * @param string $unit The type of unit that caused the error.
     * @param Exception $previous
     * @return self|Exception
     */
    public static function unknown(string $unit, Exception $previous = null): Exception
    {
        return new self(
            "Unknown unit of measurement, '{$unit}'",
            self::ERROR_UNKNOWN_UNIT,
            $previous
        );
    }
}

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
 * Exception to be thrown when a unit converter is missing a calculator.
 *
 * @version 1.0.0
 * @since 0.8.0
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class BadMeasurement extends Exception
{
    const ERROR_UNKNOWN_MEASUREMENT = 1;

    /**
     * Throw a new exception for an unknown type of measurement.
     *
     * @param string $measurement The type of measurement that caused the error.
     * @param Exception $previous
     * @return self
     */
    public static function unknown(string $measurement, Exception $previous = null): Exception
    {
        return new self(
            "Unknown type of measurement, '{$measurement}'",
            self::ERROR_UNKNOWN_MEASUREMENT,
            $previous
        );
    }
}

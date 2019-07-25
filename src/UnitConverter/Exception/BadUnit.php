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
 * Exception to be thrown when a bad unit of measurement is encountered.
 *
 * @version 1.0.0
 * @since 0.8.0
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class BadUnit extends Exception
{
    const ERROR_SCALAR_TYPE = 2;

    const ERROR_SELF_CONVERSION_FORMULA = 3;

    /**
     * Throw a new exception for an un unkown self conversioin unit formula.
     *
     * @param string $symbol The symbol of the unit lacking a formula
     * @param Exception $previous
     * @return Exception
     */
    public static function formula(string $symbol, Exception $previous = null): Exception
    {
        return new self(
            "Unknown conversion formula for {$symbol}",
            self::ERROR_SELF_CONVERSION_FORMULA,
            $previous
        );
    }

    /**
     * Throw a new exception for an unsupported scalar type of a unit's value.
     *
     * @param string $type The unsupported type that was attempted to be used.
     * @param array $types (optional) An array of supported types to use in the message.
     * @param Exception $previous
     * @return self|Exception
     */
    public static function scalar(string $type, array $types = null, Exception $previous = null): Exception
    {
        $message = "Cannot cast units to {$type}.";

        if ($types and !empty($types)) {
            $message .= " Use one of, ".implode(", ", $types);
        }

        return new self($message, self::ERROR_SCALAR_TYPE, $previous);
    }
}

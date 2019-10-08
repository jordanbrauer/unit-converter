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
 * Exception to be thrown when a unit converter has uncaught exceptions & errors.
 *
 * @version 1.0.0
 * @since 0.8.0
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
final class BadConverter extends Exception
{
    const ERROR_MISSING_CALCULATOR = 1;

    const ERROR_MISSING_REGISTRY = 2;

    /**
     * Throw a new exception for a missing calculator
     *
     * @param Exception $previous
     * @return self
     */
    public static function missingCalculator(Exception $previous = null): Exception
    {
        return new static(
            'No calculator was found to perform mathematical operations with.',
            static::ERROR_MISSING_CALCULATOR,
            $previous
        );
    }

    /**
     * Throw a new exception for a missing registry
     *
     * @param Exception $previous
     * @return self
     */
    public static function missingRegistry(Exception $previous = null): Exception
    {
        return new static(
            'No registry was found to store and retrieve units of measure from.',
            static::ERROR_MISSING_REGISTRY,
            $previous
        );
    }
}

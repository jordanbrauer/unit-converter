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

namespace UnitConverter\Calculator;

use RuntimeException;

/**
 * A concrete calculator calss that uses the bcmath library
 * to perform mathematical operations.
 *
 * @link http://php.net/manual/en/book.bc.php
 * @HACK https://github.com/jordanbrauer/unit-converter/issues/54
 *
 * @version 1.0.0
 * @since 0.4.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class BinaryCalculator extends AbstractCalculator
{
    /**
     * {@inheritDoc}
     */
    protected const SCALAR = 'string';

    /**
     * {@inheritDoc}
     */
    public function __construct(int $precision = null, int $roundingMode = null)
    {
        if (extension_loaded('bcmath')) {
            parent::__construct($precision, $roundingMode);

            return;
        }

        $fqcn = explode('\\', static::class);

        throw new RuntimeException(sprintf(
            'Unable to construct a %s due to missing bcmath library. Please check your PHP extensions.',
            end($fqcn),
        ));
    }

    /**
     * Expand a scientific notation number to it's whole form as a string.
     *
     * @param string $operand The scientifix number to be expanded.
     * @return string
     */
    private static function expandScientific(string $operand): string
    {
        $segments = explode('E', $operand);
        $exponent = end($segments);
        $format = static function ($operand, int $precision = 0): string {
            return self::product(number_format((float) $operand, $precision, '.', ''));
        };

        if ('+' === substr($exponent, 0, 1)) {
            return $format($operand);
        }

        return $format($operand, array_sum([
            (int) substr($exponent, 1),
            strlen(str_replace('.', '', reset($segments))),
        ]));
    }

    /**
     * Check if the given number is scientific notation.
     *
     * @param int|string|float $operand The value to check for scientific-ness
     * @return bool
     */
    private static function isScientific($operand): bool
    {
        return is_numeric($operand)
            and (false !== stristr($operand, 'E-') or false !== stristr($operand, 'E+'));
    }

    /**
     * Sanitize operands for use with BC math.
     *
     * @param string $value The operand value part of the calculation
     * @return string
     */
    private static function operand($value): string
    {
        $normalized = strtoupper($value);

        return (self::isScientific($normalized))
            ? self::expandScientific($normalized)
            : $value;
    }

    /**
     * Produce a valid calculation result, ensuring no trailing zeros.
     *
     * @param string $value The value to denormalize
     * @return string
     */
    private static function product(string $value): string
    {
        return (false !== stristr($value, '.')) ? rtrim($value, '0.,') : $value;
    }

    /**
     * {@inheritDoc}
     */
    public function add($leftOperand, $rightOperand)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand) and is_string($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            ...func_get_args(), // IDEA: make method arguments variadic instead
        );

        return self::product(bcadd(
            self::operand($leftOperand),
            self::operand($rightOperand),
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function div($dividend, $divisor)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand) and is_string($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            $dividend,
            $divisor,
        );

        return self::product(bcdiv(
            self::operand($dividend),
            self::operand($divisor),
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function mod($dividend, $modulus)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand) and is_string($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            $dividend,
            $modulus,
        );

        return self::product(
            bcmod(
            self::operand($dividend),
            self::operand($modulus)
        ),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function mul($leftOperand, $rightOperand)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand) and is_string($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            ...func_get_args(), // IDEA: make method arguments variadic instead
        );

        return self::product(bcmul(
            self::operand($leftOperand),
            self::operand($rightOperand),
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function pow($base, $exponent)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand) and is_string($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            $base,
            $exponent,
        );

        return self::product(bcpow(
            self::operand($base),
            self::operand($exponent),
        ));
    }

    /**
     * Overwrites the default implementation for rounding. Simply
     * casts the result to a string.
     *
     * {@inheritDoc}
     */
    public function round($value, int $precision = null)
    {
        return self::product(self::operand(
            (string) parent::round($value, $precision),
        ));
    }

    /**
     * Overwrites the default implementation for setting the precision to round
     * values to.
     *
     * {@inheritDoc}
     */
    public function setPrecision(int $precision): CalculatorInterface
    {
        $precision = ($precision * 2); // HACK: #54
        parent::setPrecision($precision);
        bcscale($precision);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function sub($leftOperand, $rightOperand)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand) and is_string($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            ...func_get_args(), // IDEA: make method arguments variadic instead
        );

        return self::product(bcsub(
            self::operand($leftOperand),
            self::operand($rightOperand),
        ));
    }
}

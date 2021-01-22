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

        return bcadd($leftOperand, $rightOperand);
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

        return bcdiv($dividend, $divisor);
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

        return bcmod($dividend, $modulus);
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

        return bcmul($leftOperand, $rightOperand);
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

        return bcpow($base, $exponent);
    }

    /**
     * Overwrites the default implementation for rounding. Simply
     * casts the result to a string.
     *
     * {@inheritDoc}
     */
    public function round($value, int $precision = null)
    {
        return (string) parent::round($value, $precision);
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

        return bcsub($leftOperand, $rightOperand);
    }
}

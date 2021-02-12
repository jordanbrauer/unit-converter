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

/**
 * A basic implementation of the CalculatorInterface for performing
 * mathematical operations with.
 *
 * @NOTE Due to the way that computers handle floating decimals, the
 * results that this calculator yields may be less than accurate. To increase
 * the accuracy of your results, you should round to more decimal places.
 *
 * @see UnitConverter\UnitConverter::convert() Increase rounding places on the fly.
 *
 * @version 1.0.0
 * @since 0.4.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class SimpleCalculator extends AbstractCalculator
{
    /**
     * {@inheritDoc}
     */
    public function add($leftOperand, $rightOperand)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            ...func_get_args(), // IDEA: make method arguments variadic instead
        );

        return $leftOperand + $rightOperand;
    }

    /**
     * {@inheritDoc}
     */
    public function div($dividend, $divisor)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            $dividend,
            $divisor,
        );

        return $dividend / $divisor;
    }

    /**
     * {@inheritDoc}
     */
    public function mod($dividend, $modulus)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            $dividend,
            $modulus,
        );

        return $dividend % $modulus;
    }

    /**
     * {@inheritDoc}
     */
    public function mul($leftOperand, $rightOperand)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            ...func_get_args(), // IDEA: make method arguments variadic instead
        );

        return $leftOperand * $rightOperand;
    }

    /**
     * {@inheritDoc}
     */
    public function pow($base, $exponent)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            $base,
            $exponent,
        );

        return pow($base, $exponent);
    }

    /**
     * {@inheritDoc}
     */
    public function sub($leftOperand, $rightOperand)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand);
            },
            __FUNCTION__,
            self::SCALAR,
            ...func_get_args(), // IDEA: make method arguments variadic instead
        );

        return $leftOperand - $rightOperand;
    }
}

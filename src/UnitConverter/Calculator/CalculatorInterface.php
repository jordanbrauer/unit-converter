<?php

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types = 1);

namespace UnitConverter\Calculator;

/**
 * The calculator interface that all abstract & concrete calculator
 * classes should implement.
 *
 * @version 1.0.0
 * @since 0.4.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
interface CalculatorInterface
{
    /**
     * Set default decimal precision for all math functions
     *
     * @param int $precision The amount of decimal places that will be returned
     * @return Calculator
     */
    public function setPrecision (int $precision): CalculatorInterface;

    /**
     * Use one of the PHP_ROUND_HALF_* constants to specify
     * the mode in which rounding occurs.
     *
     * @link https://secure.php.net/manual/en/function.round.php
     *
     * @param int $mode The mode in which rounding occurs
     * @return CalculatorInterface
     */
    public function setRoundingMode (int $roundingMode): CalculatorInterface;

    /**
     * Returns the current decimal precision for the calculator
     *
     * @return int
     */
    public function getPrecision (): int;

    /**
     * Return the current rounding mode
     *
     * @return int
     */
    public function getRoundingMode (): int;

    /**
     * Add two arbitrary precision numbers
     *
     * @param int|float|string $leftOperand The number left of the operator
     * @param int|float|string $rightOperand The number right of the operator
     * @return int|float|string
     */
    public function add ($leftOperand, $rightOperand);

    /**
     * Subtract one arbitrary precision number from another
     *
     * @param int|float|string $leftOperand The number left of the operator
     * @param int|float|string $rightOperand The number right of the operator
     * @return int|float|string
     */
    public function sub ($leftOperand, $rightOperand);

    /**
     * Multiply two arbitrary precision numbers
     *
     * @param int|float|string $leftOperand The number left of the operator
     * @param int|float|string $rightOperand The number right of the operator
     * @return int|float|string
     */
    public function mul ($leftOperand, $rightOperand);

    /**
     * Divide two arbitrary precision numbers
     *
     * @param int|float|string $dividend The number beind divided
     * @param int|float|string $divisor The number that is doing the dividing
     * @return int|float|string
     */
    public function div ($dividend, $divisor);

    /**
     * Get modulus of an arbitrary precision number
     *
     * @param int|float|string $dividend The dividend as a string
     * @param int|float|string $modulus The modulus as a string
     * @return int|float|string
     */
    public function mod ($dividend, $modulus);

    /**
     * Raise an arbitrary precision number to another
     *
     * @param int|float|string $base The base, as a string.
     * @param int|float|string $exponent The exponent, as a string. If the exponent is non-integral, it is truncated. The valid range of the exponent is platform specific, but is at least -2147483648 to 2147483647.
     * @return int|float|string
     */
    public function pow ($base, $exponent);

    /**
     * Rounds a float.
     *
     * @param int|float|string $value The value to round
     * @param int $precision The number of decimal digits to round to.
     * @return int|float|string
     */
    public function round ($value, int $precision = null);
}

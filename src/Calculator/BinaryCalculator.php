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
    public function add($leftOperand, $rightOperand)
    {
        return bcadd($leftOperand, $rightOperand);
    }

    /**
     * {@inheritDoc}
     */
    public function div($dividend, $divisor)
    {
        return bcdiv($dividend, $divisor);
    }

    /**
     * {@inheritDoc}
     */
    public function mod($dividend, $modulus)
    {
        return bcmod($dividend, $modulus);
    }

    /**
     * {@inheritDoc}
     */
    public function mul($leftOperand, $rightOperand)
    {
        return bcmul($leftOperand, $rightOperand);
    }

    /**
     * {@inheritDoc}
     */
    public function pow($base, $exponent)
    {
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
        return bcsub($leftOperand, $rightOperand);
    }
}

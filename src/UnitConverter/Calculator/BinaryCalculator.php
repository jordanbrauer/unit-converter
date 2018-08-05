<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
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
 * @HACK https://github.com/jordanbrauer/unit-converter/issues/54
 *
 * @link http://php.net/manual/en/book.bc.php
 *
 * @version 1.0.0
 * @since 0.4.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class BinaryCalculator extends AbstractCalculator
{
    public function setPrecision(int $precision): CalculatorInterface
    {
        $precision = ($precision * 2); // HACK: #54
        parent::setPrecision($precision);
        bcscale($precision);
        return $this;
    }

    /**
     * Overwrites the default implementation for rounding. Simply
     * casts the result to a string.
     */
    public function round ($value, int $precision = null): string
    {
        return (string) parent::round($value, $precision);
    }

    public function add ($leftOperand, $rightOperand)
    {
        return bcadd($leftOperand, $rightOperand);
    }

    public function sub ($leftOperand, $rightOperand)
    {
        return bcsub($leftOperand, $rightOperand);
    }

    public function mul ($leftOperand, $rightOperand)
    {
        return bcmul($leftOperand, $rightOperand);
    }

    public function div ($dividend, $divisor)
    {
        return bcdiv($dividend, $divisor);
    }

    public function mod ($dividend, $modulus)
    {
        return bcmod($dividend, $modulus);
    }

    public function pow ($base, $exponent)
    {
        return bcpow($base, $exponent);
    }
}

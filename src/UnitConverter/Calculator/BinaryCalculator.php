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
 * A concrete calculator calss that uses the bcmath library
 * to perform mathematical operations.
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
        parent::setPrecision($precision);
        bcscale($precision);
        return $this;
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

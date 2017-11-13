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

declare(strict_types = 1);

namespace UnitConverter\Calculator;

/**
 * Internal math helper class for floating point decimal
 * percision
 *
 * @version 1.0.0
 * @since 0.4.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class SimpleCalculator extends AbstractCalculator
{
  /**
   * @var int $roundingMode The mode in which rounding occurs. Use one of the PHP_ROUND_HALF_* constants.
   */
  protected $roundingMode;

  public function __construct (int $precision = 2, int $roundingMode = PHP_ROUND_HALF_UP)
  {
    parent::__construct($precision);
    $this->setRoundingMode($roundingMode);
  }

  /**
   * Use one of the PHP_ROUND_HALF_* constants to specify
   * the mode in which rounding occurs.
   *
   * @link https://secure.php.net/manual/en/function.round.php
   *
   * @param int $mode The mode in which rounding occurs
   * @return CalculatorInterface
   */
  public function setRoundingMode (int $roundingMode = PHP_ROUND_HALF_UP): CalculatorInterface
  {
    $this->roundingMode = $roundingMode;
    return $this;
  }

  /**
   * Return the current rounding mode
   *
   * @return int
   */
  public function getRoundingMode (): int
  {
    return $this->roundingMode;
  }

  /**
   * Return the result of a rounded float
   *
   * @param int|float $value The value to round
   * @return float
   */
  public function round ($value): float
  {
    return round(
      $value,
      $this->getPrecision(),
      $this->getRoundingMode()
    );
  }

  public function add ($leftOperand, $rightOperand)
  {
    return $this->round(($leftOperand + $rightOperand));
  }

  public function sub ($leftOperand, $rightOperand)
  {
    return $this->round(($leftOperand - $rightOperand));
  }

  public function mul ($leftOperand, $rightOperand)
  {
    return $this->round(($leftOperand * $rightOperand));
  }

  public function div ($dividend, $divisor)
  {
    return $this->round(($dividend / $divisor));
  }

  public function mod ($dividend, $modulus)
  {
    return $this->round(($dividend % $modulus));
  }

  public function pow ($base, $exponent)
  {
    return $this->round(pow($base, $exponent));
  }
}

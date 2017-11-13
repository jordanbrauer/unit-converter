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
abstract class AbstractCalculator implements CalculatorInterface
{
  /**
   * @var int $precision The number of decimal places that will calculated
   */
  protected $precision;

  /**
   * Public constructor for the unit converter calculator.
   *
   * @param int $precision The number of decimal places that will be calculated
   */
  public function __construct (int $precision = 2)
  {
    $this->setPrecision($precision);
  }

  public function setPrecision (int $precision): CalculatorInterface
  {
    $this->precision = $precision;
    return $this;
  }

  public function getPrecision (): int
  {
    return $this->precision;
  }

  abstract public function add ($leftOperand, $rightOperand);

  abstract public function sub ($leftOperand, $rightOperand);

  abstract public function mul ($leftOperand, $rightOperand);

  abstract public function div ($dividend, $divisor);

  abstract public function mod ($dividend, $modulus);

  abstract public function pow ($base, $exponent);


  /**
   * Syntacital sugar wrapper method for sub
   */
  public function subtract (...$params)
  {
    return $this->sub(...$params);
  }

  /**
   * Syntacital sugar wrapper method for mul
   */
  public function multiply (...$params)
  {
    return $this->mul(...$params);
  }

  /**
   * Syntacital sugar wrapper method for div
   */
  public function divide (...$params)
  {
    return $this->div(...$params);
  }

  /**
   * Syntacital sugar wrapper method for mod
   */
  public function modulus (...$params)
  {
    return $this->mod(...$params);
  }

  /**
   * Syntacital sugar wrapper method for pow
   */
  public function power (...$params)
  {
    return $this->pow(...$params);
  }
}

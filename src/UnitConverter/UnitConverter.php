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

namespace UnitConverter;

use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Exception\MissingUnitRegistryException;
use UnitConverter\Exception\MissingCalculatorException;
use UnitConverter\Registry\UnitRegistryInterface;
use UnitConverter\Unit\UnitInterface;

/**
 * The actual unit converter object.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class UnitConverter implements UnitConverterInterface
{
  /**
   * @var UnitRegistryInterface $registry The registry that the unit converter accesses available units from
   */
  protected $registry;

  /**
   * @var CalculatorInterface $calculator The converters internal calculator used to handle mathematical operations
   */
  protected $calculator;

  /**
   * @var float $convert The value being converted.
   */
  protected $convert;

  /**
   * @var string $from The unit of measure being converted **from**.
   */
  protected $from;

  /**
   * @var string $to The unit of measure being converted **to**.
   */
  protected $to;

  /**
   * @var int $percision The decimal precision to be calculated
   */
  protected $percision;

  /**
   * Public constructor function for the UnitConverter class.
   *
   * @param UnitInterface[] $registry A two-dimensional array of UnitInterface objects.
   * @return self
   */
  public function __construct (UnitRegistryInterface $registry, CalculatorInterface $calculator)
  {
    $this->setRegistry($registry);
    $this->setCalculator($calculator);
  }

  public function convert ($value, int $percision = null)
  {
    $this->percision = $percision;
    $this->convert = $value;
    return $this;
  }

  public function from (string $unit)
  {
    $this->from = $this->loadUnit($unit);
    return $this;
  }

  public function to (string $unit)
  {
    $this->to = $this->loadUnit($unit);
    return $this->calculate(
      $this->calculator,
      $this->convert,
      $this->from,
      $this->to,
      $this->percision
    );
  }

  /**
   * Calculate the conversion from one unit to another.
   *
   * @FIXME Gross use of a check for a null calculate() method ... 😑 Gotta
   * figure out a better way to use the calulate method.
   *
   * @internal
   * @throws MissingCalculatorException
   * @param CalculatorInterface $calculator $The calculator being used to
   * @param int|float|string $value The initial value being converted.
   * @param UnitInterface $from The unit of measure being converted **from**.
   * @param UnitInterface $to The unit of measure being converted **to**.
   * @param int $percision The decimal percision to be calculated
   * @return int|float|string
   */
  protected function calculate (
    CalculatorInterface $calculator,
    $value,
    UnitInterface $from,
    UnitInterface $to,
    int $percision = null
  ) {
    $selfConversion = $from->convert($calculator, $value, $to, $percision);

    if ($selfConversion)
      return $selfConversion;

    if ($this->calculatorExists() === false)
      throw new MissingCalculatorException("No calculator was found to perform mathematical operations with.");

    # If the unit does not implement the calculate() method, convert it manually.
    return $calculator->round(
      $calculator->div(
        $calculator->mul($value, $from->getUnits()),
        $to->getUnits()
      ),
      $percision
    );
  }

  /**
   * Load a unit from the unit converter registry.
   *
   * @internal
   * @uses UnitConverter\UnitRegistry::loadUnit
   * @throws MissingUnitRegistryException An out of bounds exception will be thrown if an attempt is made to access a non-existent registry.
   * @return UnitInterface
   */
  protected function loadUnit(string $symbol): UnitInterface
  {
    if ($this->registryExists() === false)
      throw new MissingUnitRegistryException("No unit registry was found to load units from.");

    return $this->registry->loadUnit($symbol);
  }

  /**
   * Set the unit converter registry for storing units of measure to convert values with.
   *
   * @api
   * @param UnitRegistryInterface $registry An instance of UnitRegistry.
   */
  public function setRegistry (UnitRegistryInterface $registry): UnitConverterInterface
  {
    $this->registry = $registry;
    return $this;
  }

  /**
   * Set the unit converter calculator to perform mathematical operations with.
   *
   * @api
   * @param CalculatorInterface $calculator An instance of a CalculatorInterface
   */
  public function setCalculator (CalculatorInterface $calculator): UnitConverterInterface
  {
    $this->calculator = $calculator;
    return $this;
  }

  /**
   * Determine whether or not the converter has an active registry.
   *
   * @internal
   * @return bool
   */
  protected function registryExists (): bool
  {
    if ($this->registry instanceof UnitRegistryInterface)
      return true;

    return false;
  }

  /**
   * Determine whether or not the converter has an active calculator.
   *
   * @internal
   * @return bool
   */
  protected function calculatorExists (): bool
  {
    if ($this->calculator instanceof CalculatorInterface)
      return true;

    return false;
  }
}

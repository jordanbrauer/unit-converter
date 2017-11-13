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

use UnitConverter\Exception\MissingUnitRegistryException;
use UnitConverter\Unit\UnitInterface;
use UnitConverter\Registry\UnitRegistryInterface;

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
   * @var UnitRegistryInterface The registry that the unit converter accesses available units from.
   */
  protected $registry;

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
   * Public constructor function for the UnitConverter class.
   *
   * @param UnitInterface[] $registry A two-dimensional array of UnitInterface objects.
   * @return self
   */
  public function __construct (UnitRegistryInterface $registry = null)
  {
    $this->setRegistry($registry);
  }

  /**
   * Determine whether or not the converter has an active registry.
   *
   * @internal
   * @return bool
   */
  protected function registryExists () : bool
  {
    if ($this->registry instanceof UnitRegistryInterface)
      return true;

    return false;
  }

  /**
   * Load a unit from the unit converter registry.
   *
   * @internal
   * @uses UnitConverter\UnitRegistry::loadUnit
   * @throws MissingUnitRegistryException An out of bounds exception will be thrown if an attempt is made to access a non-existent registry.
   * @return UnitInterface
   */
  protected function loadUnit(string $symbol) : UnitInterface
  {
    if ($this->registryExists() === false)
      throw new MissingUnitRegistryException("No unit registry was found to load units from.");

    return $this->registry->loadUnit($symbol);
  }

  /**
   * Calculate the conversion from one unit to another.
   *
   * @FIXME Gross use of a check for a null calculate() method ... 😑 Gotta
   * figure out a better way to use the calulate method.
   *
   * @internal
   * @param float $value The initial value being converted.
   * @param UnitInterface $from The unit of measure being converted **from**.
   * @param UnitInterface $to The unit of measure being converted **to**.
   * @return float
   */
  protected function calculate (float $value, UnitInterface $from, UnitInterface $to): float
  {
    $selfConversion = $from->convert($value, $to);

    if ($selfConversion)
      return $selfConversion;

    # If the unit does not implement the calculate() method, convert it manually.
    return ($value * $from->getUnits()) / $to->getUnits();
  }

  public function setRegistry ($registry) : UnitConverterInterface
  {
    $this->registry = $registry;
    return $this;
  }

  public function convert (float $value)
  {
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
    return $this->calculate($this->convert, $this->from, $this->to);
  }
}

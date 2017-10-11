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

namespace UnitConverter\Registry;

use UnitConverter\Exception\{
  UnknownUnitOfMeasureException,
  UnknownMeasurementTypeException
};
use UnitConverter\Measure;
use UnitConverter\Unit\UnitInterface;

/**
 * The unit converter registry object. This object is used
 * to store and retrieve instances of the UnitInterface.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class UnitRegistry implements UnitRegistryInterface
{
  /**
   * @var array $store A two-dimensional array containing available types of measuerment that each contain their available units of measure.
   */
  protected $store = array();

  /**
   * Public constructor function for the unit registry.
   *
   * @param UnitInterface[] A one-dimensional array of UnitInterface objects to be registered upon construction.
   * @return self
   */
  public function __construct (array $units = array())
  {
    $this->store = array(
      Measure::LENGTH => array(),
      Measure::AREA => array(),
      Measure::VOLUME => array(),
      Measure::MASS => array(),
      Measure::SPEED => array(),
      Measure::PLANE_ANGLE => array(),
      Measure::TEMPERATURE => array(),
      Measure::PRESSURE => array(),
      Measure::TIME => array(),
      Measure::ENERGY => array(),
    );

    if (count($units) > 0)
      $this->registerUnits($units);
  }

  public function isMeasurementRegistered (string $measurement) : bool
  {
    return array_key_exists($measurement, $this->store);
  }

  public function isUnitRegistered (string $symbol) : bool
  {
    foreach ($this->store as $measurement => $units) {
      if (array_key_exists($symbol, $units))
        return true;
    }

    return false;
  }

  public function loadUnit (string $symbol) : ?UnitInterface
  {
    if ($this->isUnitRegistered($symbol) === false)
      throw new UnknownUnitOfMeasureException("Trying to access unregistered unit of '{$symbol}'");

    foreach ($this->store as $measurement => $units) {
      if (array_key_exists($symbol, $units))
        return $this->store[$measurement][$symbol];
    }
  }

  public function listMeasurements () : array
  {
    return array_keys($this->store);
  }

  public function listUnits (string $measurement = null) : array
  {
    if ($measurement) {
      return array_keys($this->store[$measurement]);
    }

    $registeredUnits = array();

    foreach ($this->store as $measurements) {
      foreach ($measurements as $unit) {
        array_push($registeredUnits, $unit->getSymbol());
      }
    }

    return $registeredUnits;
  }

  public function registerMeasurement (string $measurement) : void
  {
    if ($this->isMeasurementRegistered($measurement) === false)
      $this->store[$measurement] = $measurement;
  }

  public function registerMeasurements (array $measurements) : void
  {
    foreach ($measurements as $measurement) {
      $this->registerMeasurement($measurement);
    }
  }

  public function registerUnit (UnitInterface $unit) : void
  {
    if (!$this->isMeasurementRegistered($unit->getUnitOf()))
      throw new UnknownMeasurementTypeException("Trying to register unit '{$unit->getName()}' to an unregisted measurement of '{$unit->getUnitOf()}'");

    $this->store[$unit->getUnitOf()][$unit->getSymbol()] = $unit;
  }

  public function registerUnits (array $units) : void
  {
    foreach ($units as $unit) {
      $this->registerUnit($unit);
    }
  }

  public function unregisterMeasurement (string $measurement) : void
  {
    if (!$this->isMeasurementRegistered($measurement))
      throw new UnknownMeasurementTypeException("Trying to unregister a nonexistent measurement type {$measurement}");

    unset($this->store[$measurement]);
  }

  public function unregisterMeasurements(array $measurements) : void
  {
    foreach ($measurements as $measurement) {
      $this->unregisterMeasurement($measurement);
    }
  }

  public function unregisterUnit (string $symbol) : void
  {
    if ($this->isUnitRegistered($symbol) === false)
      throw new UnknownUnitOfMeasureException("Trying to unregister a nonexistent unit {$symbol}");

    $unit = $this->loadUnit($symbol);
    unset($this->store[$unit->getUnitOf()][$symbol]);
  }

  public function unregisterUnits (array $symbols) : void
  {
    foreach ($symbols as $unit) {
      $this->unregisterUnit($unit);
    }
  }
}

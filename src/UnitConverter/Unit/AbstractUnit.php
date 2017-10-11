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

namespace UnitConverter\Unit;

/**
 * This class is the base class for all unit of measurement classes. When creating
 * a new/custom unit of measure, extend from this class. The Bare minimum
 * requirements for usage are defining all properties.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
abstract class AbstractUnit implements UnitInterface
{
  /**
   * @var string $name The units' full name.
   */
  protected $name;

  /**
   * @var string $symbol The units' symbol notation (e.g., meter = m).
   */
  protected $symbol;

  /**
   * @var string $unit_of What is this unit measuring? Length, temperatutre, etc.
   */
  protected $unitOf;

  /**
   * @var UnitInterface $base The units' base unit.
   */
  protected $base;

  /**
   * @var float $units The amount of base units needed to make up 1 unit.
   */
  protected $units;

  public function __construct ()
  {
    $this->configure();
  }

  /**
   * Configure the current unit of measure.
   *
   * @return void
   */
  protected function configure () : void
  {
  }

  /**
   * Calculate the amount of required base units to make up 1 unit.
   *
   * @param float $value
   * @param UnitInterface $to
   * @return null|float
   */
  protected function calculate (float $value, UnitInterface $to) : ?float
  {
    return null;
  }

  /**
   * Exposes access to the ::calculate() method.
   *
   * @param float $value
   * @param UnitInterface $to
   * @return null|float
   */
  public function convert (float $value, UnitInterface $to)
  {
    return $this->calculate($value, $to);
  }

  public function setName (string $name) : UnitInterface
  {
    $this->name = $name;
    return $this;
  }

  public function getName () : string
  {
    return $this->name;
  }

  public function setSymbol (string $symbol) : UnitInterface
  {
    $this->symbol = $symbol;
    return $this;
  }

  public function getSymbol () : string
  {
    return $this->symbol;
  }

  public function setUnitOf (string $unitOf) : UnitInterface
  {
    $this->unitOf = $unitOf;
    return $this;
  }

  public function getUnitOf () : string
  {
    return $this->unitOf;
  }

  public function setBase ($base) : UnitInterface
  {
    $this->base = $base;
    return $this;
  }

  public function getBase () : UnitInterface
  {
    return new $this->base;
  }

  public function setUnits (float $units) : UnitInterface
  {
    $this->units = $units;
    return $this;
  }

  public function getUnits () : float
  {
    return $this->units;
  }

  public function getBaseUnits () : float
  {
    return $this->getBase()->getUnits();
  }
}

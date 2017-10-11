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
 * Interface for the unit of measurement abstract class.
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
interface UnitInterface
{
  /**
   * Sets the units full symantic name.
   *
   * @return UnitInterface
   */
  public function setName (string $name) : UnitInterface;

  /**
   * Returns the full symantic name of the unit.
   *
   * @return string
   */
  public function getName () : string;

  /**
   * Sets the symbol notation used for the unit.
   *
   * @return UnitInterface
   */
  public function setSymbol (string $symbol) : UnitInterface;

  /**
   * Returns the symbol notation of the unit.
   *
   * @return string
   */
  public function getSymbol () : string;

  /**
   * Sets the type of measurement that this unit is measuring.
   *
   * @return UnitInterface
   */
  public function setUnitOf (string $unitOf) : UnitInterface;

  /**
   * Returns the type of measurement that this unit is measuring.
   *
   * @return string
   */
  public function getUnitOf () : string;

  /**
   * Sets the unit class that this unit is based off of.
   *
   * @return UnitInterface
   */
  public function setBase (UnitInterface $base) : UnitInterface;

  /**
   * Returns the unit class that this unit is based off of.
   *
   * @return UnitInterface
   */
  public function getBase () : UnitInterface;

  /**
   * Sets the amount of base units required to make up 1 of the unit.
   *
   * @return UnitInterface
   */
  public function setUnits (float $units) : UnitInterface;

  /**
   * Returns the amount of base units required to make up 1 of the unit.
   *
   * @return float
   */
  public function getUnits () : float;
}

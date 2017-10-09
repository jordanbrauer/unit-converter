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

use UnitConverter\Unit\UnitInterface;

/**
 * The interface for any and all unit converter classes. If you want
 * a custom converter, implement this interface and you are good to
 * go!
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
interface UnitConverterInterface
{
  /**
   * Set the unit converter registry for storing units of measure to convert values with.
   *
   * @api
   * @param UnitRegistryInterface $registry An instance of UnitRegistry.
   */
  public function setRegistry ($registry) : UnitConverterInterface;

  /**
   * Set the unit converters' value to be converted. This method is the first
   * method to be called in the chain of conversion methods.
   *
   * @api
   * @example $converter->convert(1)->from("in")->to("cm");
   * @param float $value The numerical value being converted.
   */
  public function convert (float $value);

  /**
   * Set the unit converters' unit to be converted **from**. This method is the
   * second to be called in the chain of conversion methods.
   *
   * @api
   * @example $converter->convert(1)->from("in")->to("cm");
   * @param string $unit The unit being conerted **from**. The unit must first be registered to the UnitRegistry.
   */
  public function from (string $unit);

  /**
   * Set the unit converters' unit to be converted **to**. This method is the
   * third to be called in the chain of conversion methods.
   *
   * @api
   * @example $converter->convert(1)->from("in")->to("cm");
   * @param string $unit The unit being converted **to**. The unit must first be registered to the UnitRegistry.
   */
  public function to (string $unit);
}

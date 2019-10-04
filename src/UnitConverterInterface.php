<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter;

/**
 * The interface for any and all unit converter classes.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @codeCoverageIgnore
 */
interface UnitConverterInterface
{
    /**
     * Set the unit converters' value to be converted. This method is the first
     * method to be called in the chain of conversion methods.
     *
     * @example $converter->convert(1)->from("in")->to("cm");
     * @api
     * @param int|float|string $value The numerical value being converted.
     * @param int $precision The decimal precision to be rounded to
     * @return UnitConverterInterface
     */
    public function convert($value, int $precision = null): UnitConverterInterface;

    /**
     * Set the unit converters' unit to be converted **from**. This method is the
     * second to be called in the chain of conversion methods.
     *
     * @example $converter->convert(1)->from("in")->to("cm");
     * @api
     * @param string $unit The unit being conerted **from**. The unit must first be registered to the UnitRegistry.
     * @return UnitConverterInterface
     */
    public function from(string $unit): UnitConverterInterface;

    /**
     * Set the unit converters' unit to be converted **to**. This method is the
     * third to be called in the chain of conversion methods.
     *
     * @example $converter->convert(1)->from("in")->to("cm");
     * @api
     * @param string $unit The unit being converted **to**. The unit must first be registered to the UnitRegistry.
     * @return int|float|string
     */
    public function to(string $unit);
}

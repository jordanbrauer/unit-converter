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

namespace UnitConverter\Exception;

use OutOfBoundsException;

/**
 * Exception to be thrown when a unit converter is missing a calculator.
 *
 * @version 1.0.0
 * @since 0.4.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class MissingCalculatorException extends OutOfBoundsException
{
}

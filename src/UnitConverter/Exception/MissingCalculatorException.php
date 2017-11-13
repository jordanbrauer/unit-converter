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

namespace UnitConverter\Exception;

use OutOfBoundsException;

/**
 * Exception thrown when the unit converter is missing a calculator
 */
class MissingCalculatorException extends OutOfBoundsException
{
}

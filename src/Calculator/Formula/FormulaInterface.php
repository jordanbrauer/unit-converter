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

namespace UnitConverter\Calculator\Formula;

/**
 * The interface for mathematical formulae.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @codeCoverageIgnore
 */
interface FormulaInterface
{
    /**
     * Return the result of a mathematical expression, representing an amount of
     * units.
     *
     * @param int|float|string $value
     * @param int|float|string $fromUnits
     * @param int|float|string $toUnits
     * @param int $precision
     * @return int|float|string
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null);
}

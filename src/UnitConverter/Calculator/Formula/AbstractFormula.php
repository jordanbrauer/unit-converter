<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Calculator\Formula;

use UnitConverter\Calculator\CalculatorInterface;

/**
 * An abstract conversion formula class to handle generic & common operations.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
abstract class AbstractFormula implements FormulaInterface
{
    /**
     * The calculator to run the formula through.
     *
     * @var CalculatorInterface
     */
    protected $calculator;

    /**
     * The string representation of the formula.
     *
     * @var string
     */
    protected $string = '';

    /**
     * Public constructor method.
     *
     * @param CalculatorInterface $calculator
     * @return self
     */
    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * Return the string representation of this object.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->string;
    }

    /**
     * {@inheritDoc}
     */
    abstract public function describe($value, $fromUnits, $toUnits, int $precision = null);
}

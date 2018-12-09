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

use UnitConverter\Calculator\CalculatorInterface;

/**
 * An abstract conversion formula class to handle generic & common operations.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
abstract class AbstractFormula implements FormulaInterface
{
    /**
     * The string representation of the formula.
     *
     * @const string
     */
    const FORMULA_STRING = '';

    /**
     * The template of the formula for casting to a string after running an operation.
     *
     * @const string
     */
    const FORMULA_TEMPLATE = '';

    /**
     * The calculator to run the formula through.
     *
     * @var CalculatorInterface
     */
    protected $calculator;

    /**
     * A one-dimensional array of values to plug into the formula template when
     * this formula is casted to a string.
     *
     * @var array
     */
    protected $values = [];

    /**
     * Public constructor method.
     *
     * @param CalculatorInterface $calculator
     * @return self
     */
    public function __construct(CalculatorInterface $calculator = null)
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
        return ((mb_strlen(static::FORMULA_TEMPLATE) > 0) and (count($this->values) > 0))
            ? sprintf(static::FORMULA_TEMPLATE, ...$this->values)
            : static::FORMULA_STRING;
    }

    /**
     * {@inheritDoc}
     */
    abstract public function describe($value, $fromUnits, $toUnits, int $precision = null);

    /**
     * Explicitly sets the calculator for a formula.
     *
     * @param CalculatorInterface $calculator The calculator that will be set for describing values.
     * @return FormulaInterface
     */
    public function setCalculator(CalculatorInterface $calculator): FormulaInterface
    {
        $this->calculator = $calculator;

        return $this;
    }

    /**
     * Set the values (passed _**in order**_) to be used for the template for
     * logging a complete version of the formula.
     *
     * @param mixed ...$variables A variadic set of arguments, passed in order to fill the template with.
     * @return void
     */
    protected function plugVariables(...$variables): void
    {
        $this->values = $variables;
    }
}

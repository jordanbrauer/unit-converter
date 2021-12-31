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

namespace UnitConverter\Calculator;

use Closure;
use TypeError;
use UnitConverter\Calculator\Formula\FormulaInterface;

/**
 * The abstract calculator class that all concrete calculators should
 * extend from.
 *
 * @version 1.0.0
 * @since 0.4.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @codeCoverageIgnore
 */
abstract class AbstractCalculator implements CalculatorInterface
{
    /**
     * The default precision value.
     *
     * @const int DEFAULT_PRECISION
     */
    const DEFAULT_PRECISION = 2;

    /**
     * The default rounding mode for calculators.
     *
     * @const int DEFAULT_ROUNDING_MODE
     */
    const DEFAULT_ROUNDING_MODE = self::ROUND_HALF_UP;

    /**
     * Makes 1.5 into 1 and -1.5 into -1.
     *
     * @const int ROUND_HALF_DOWN
     */
    const ROUND_HALF_DOWN = PHP_ROUND_HALF_DOWN;

    /**
     * Rounds to the nearest even value.
     *
     * @const int ROUND_HALF_EVEN
     */
    const ROUND_HALF_EVEN = PHP_ROUND_HALF_EVEN;

    /**
     * Rounds to the nearest odd value.
     *
     * @const int ROUND_HALF_ODD
     */
    const ROUND_HALF_ODD = PHP_ROUND_HALF_ODD;

    /**
     * Makes 1.5 into 2 and -1.5 into -2.
     *
     * @const int ROUND_HALF_UP
     */
    const ROUND_HALF_UP = PHP_ROUND_HALF_UP;

    /**
     * String value representation of the allowed scalar type(s) for the
     * calculator's inputs.
     */
    protected const SCALAR = 'int|float|string';

    /**
     * A non-persitent stack of events for the current calculator's calculations
     *
     * @var array $history
     */
    protected $history;

    /**
     * The number of decimal places that will calculated
     *
     * @var int $precision
     */
    protected $precision;

    /**
     * The mode in which rounding occurs. Use one of the PHP_ROUND_HALF_* constants.
     *
     * @var int $roundingMode
     */
    protected $roundingMode;

    /**
     * Public constructor for the unit converter calculator. For a list of
     * valid $roundingMode arguments, see the PHP_ROUND_HALF_* constants.
     *
     * @link https://secure.php.net/manual/en/function.round.php
     *
     * @param int $precision The number of decimal digits to round to.
     * @param int $roundingMode The mode in which rounding occurs.
     * @return self
     */
    public function __construct(int $precision = null, int $roundingMode = null)
    {
        $this->init(
            ($precision ?? self::DEFAULT_PRECISION),
            ($roundingMode ?? self::DEFAULT_ROUNDING_MODE)
        );
    }

    /**
     * {@inheritDoc}
     */
    abstract public function add($leftOperand, $rightOperand);

    /**
     * {@inheritDoc}
     */
    abstract public function div($dividend, $divisor);

    /**
     * {@inheritDoc}
     */
    abstract public function mod($dividend, $modulus);

    /**
     * {@inheritDoc}
     */
    abstract public function mul($leftOperand, $rightOperand);

    /**
     * {@inheritDoc}
     */
    abstract public function pow($base, $exponent);

    /**
     * {@inheritDoc}
     */
    abstract public function sub($leftOperand, $rightOperand);

    /**
     * Throw a type error if the given closure does not evaluate to true for one
     * of given values. The name of the method and allowed type string are used
     * to create an error message.
     *
     * @param Closure $assert Type check that must return true, otherwise an error is thrown
     * @param string $method The name of the method that is calling this method, used for error message
     * @param string $allowed The allowed type of the value, used for error message
     * @param mixed ...$value One or more values to test with the given closure
     * @return void
     * @throws TypeError When the given closure does not return true
     */
    protected static function invariant(Closure $assert, string $method, string $allowed, ...$value): void
    {
        foreach ($value as $position => $arg) {
            if ($assert($arg)) {
                continue;
            }

            throw new TypeError(sprintf(
                'Argument %d passed to %s::%s must be of the type %s, %s given',
                1 + $position,
                static::class,
                $method,
                $allowed,
                gettype($arg),
            ));
        }
    }

    /**
     * Syntacital sugar wrapper method for div.
     *
     * @api
     * @uses CalculatorInterface::div
     */
    public function divide(...$params)
    {
        return $this->div(...$params);
    }

    /**
     * Dump the calculator's history. Optionally clear the calculator afterwards.
     *
     * @api
     * @param boolean $clear (optional) Clear the calculator after dumping.
     * @return array
     */
    public function dump(bool $clear = false): array
    {
        $history = $this->history;

        if ($clear) {
            $this->init(self::DEFAULT_PRECISION, self::DEFAULT_ROUNDING_MODE);
        }

        return $history;
    }

    /**
     * A robust calculator method to run formulaic operations, abstracting the
     * logic to a single, contained class.
     *
     * @api
     * @param FormulaInterface $formula The formula to run.
     * @param mixed ...$parameters A variadic set of arguments to pass to the formula.
     * @return int|float|string
     */
    public function exec(FormulaInterface $formula, ...$parameters)
    {
        $formula = (clone $formula)->setCalculator($this);
        $result = $formula->describe(...$parameters);

        $this->history[] = (string) $formula;

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function getPrecision(): ?int
    {
        return $this->precision;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoundingMode(): ?int
    {
        return $this->roundingMode;
    }

    /**
     * Syntacital sugar wrapper method for mod
     *
     * @api
     * @uses CalculatorInterface::mod
     */
    public function modulus(...$params)
    {
        return $this->mod(...$params);
    }

    /**
     * Syntacital sugar wrapper method for mul
     *
     * @api
     * @uses CalculatorInterface::mul
     */
    public function multiply(...$params)
    {
        return $this->mul(...$params);
    }

    /**
     * Syntacital sugar wrapper method for pow
     *
     * @api
     * @uses CalculatorInterface::pow
     */
    public function power(...$params)
    {
        return $this->pow(...$params);
    }

    /**
     * {@inheritDoc}
     */
    public function round($value, int $precision = null)
    {
        self::invariant(
            static function ($operand): bool {
                return is_numeric($operand);
            },
            __FUNCTION__,
            static::SCALAR,
            $value,
        );

        return round(
            (float) $value,
            ($precision ?? $this->getPrecision()),
            $this->getRoundingMode()
        );
    }

    /**
     * {@inheritDoc}
     */
    public function setPrecision(int $precision): CalculatorInterface
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setRoundingMode(int $roundingMode): CalculatorInterface
    {
        $this->roundingMode = $roundingMode;

        return $this;
    }

    /**
     * Syntacital sugar wrapper method for sub
     *
     * @api
     * @uses CalculatorInterface::sub
     */
    public function subtract(...$params)
    {
        return $this->sub(...$params);
    }

    /**
     * Helper method to initialize the calculator's settings.
     *
     * @param int $precision The number of decimal digits to round to.
     * @param int $roundingMode The mode in which rounding occurs.
     * @return void
     */
    private function init(int $precision, int $roundingMode): void
    {
        $this->history = [];
        $this->setPrecision($precision);
        $this->setRoundingMode($roundingMode);
    }
}

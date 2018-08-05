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

namespace UnitConverter\Unit;

use UnitConverter\Calculator\CalculatorInterface;

/**
 * This class is the base class for all unit of measurement classes.
 * When creating a new/custom unit of measure, extend from this class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
abstract class AbstractUnit implements UnitInterface
{
    /**
     * @var string|UnitInterface $base The units' base unit classname.
     */
    protected $base;

    /**
     * @var string $name The units' full name.
     */
    protected $name;

    /**
     * @var string The scientific symbol of the unit
     */
    protected $scientificSymbol;

    /**
     * @var string $symbol The units' symbol notation (e.g., meter = m).
     */
    protected $symbol;

    /**
     * @var string $unitOf What is this unit measuring? Length, temperatutre, etc.
     */
    protected $unitOf;

    /**
     * @var float $units The amount of base units needed to make up 1 unit.
     */
    protected $units;

    /**
     * Public constructor function for units of measurement.
     */
    public function __construct()
    {
        $this->configure();
    }

    /**
     * Exposes access to the ::calculate() method.
     */
    public function convert(...$params)
    {
        return $this->calculate(...$params);
    }

    public function getBase(): ?UnitInterface
    {
        return new $this->base();
    }

    public function getBaseUnits(): ?float
    {
        return $this->getBase()->getUnits();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getRegistryKey(): ?string
    {
        return $this->unitOf.'.'.$this->symbol;
    }

    public function getScientificSymbol(): ?string
    {
        return $this->scientificSymbol ?? $this->getSymbol();
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function getUnitOf(): ?string
    {
        return $this->unitOf;
    }

    public function getUnits(): ?float
    {
        return $this->units;
    }

    public function isMultipleSiUnit(): bool
    {
        return $this instanceof SiMultipleUnitInterface;
    }

    public function isSiUnit(): bool
    {
        return $this instanceof SiBaseUnitInterface;
    }

    public function isSubmultipleSiUnit(): bool
    {
        return $this instanceof SiSubmultipleUnitInterface;
    }

    public function setBase($base): UnitInterface
    {
        $this->base = $base;

        return $this;
    }

    public function setName(string $name): UnitInterface
    {
        $this->name = $name;

        return $this;
    }

    public function setScientificSymbol(string $scientificSymbol): UnitInterface
    {
        $this->scientificSymbol = $scientificSymbol;

        return $this;
    }

    public function setSymbol(string $symbol): UnitInterface
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function setUnitOf(string $unitOf): UnitInterface
    {
        $this->unitOf = $unitOf;

        return $this;
    }

    public function setUnits(float $units): UnitInterface
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Calculate the amount of required base units to make up 1 unit.
     *
     * @throws BadUnit If a unit attempts self conversion and has no formula
     * @param CalculatorInterface $calculator
     * @param int|float|string $value
     * @param UnitInterface $to
     * @param int $precision The decimal percision to be calculated
     * @return null|int|float|string
     */
    protected function calculate(CalculatorInterface $calculator, $value, UnitInterface $to, int $precision = null)
    {
    }

    /**
     * Configure the current unit of measure.
     *
     * @return void
     */
    protected function configure(): void
    {
    }
}

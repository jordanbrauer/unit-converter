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

namespace UnitConverter\Unit;

use UnitConverter\Calculator\Formula\FormulaInterface;

/**
 * Interface for the unit of measurement abstract class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @codeCoverageIgnore
 */
interface UnitInterface
{
    /**
     * Add a new formula to the unit.
     *
     * @param string $symbol The symbol of the unit to use for identifying the formula.
     * @param string $class The class name (FQCN) of formula implementation.
     * @return void
     */
    public function addFormula(string $symbol, string $class): void;

    /**
     * Add multiple formulae to the unit.
     *
     * @param array $formulae An associative array containing the symbol & class.
     * @return void
     */
    public function addFormulae(array $formulae): void;

    /**
     * Returns the unit class that this unit is based off of.
     *
     * @return UnitInterface
     */
    public function getBase(): ?UnitInterface;

    /**
     * Returns the units base unit units'.
     *
     * @return float
     */
    public function getBaseUnits(): ?float;

    /**
     * Return a unit's conversion formula, if it has one.
     *
     * @param UnitInterface $to The unit being converted to.
     * @return null|FormulaInterface
     */
    public function getFormulaFor(UnitInterface $to): ?FormulaInterface;

    /**
     * Returns the full symantic name of the unit.
     *
     * @return string
     */
    public function getName(): ?string;

    /**
     * Returns the unit's registry key.
     *
     * @return string|null
     */
    public function getRegistryKey(): ?string;

    /**
     * Returns the symbol notation of the unit.
     *
     * @return string
     */
    public function getScientificSymbol(): ?string;

    /**
     * Returns the symbol notation of the unit.
     *
     * @return string
     */
    public function getSymbol(): ?string;

    /**
     * Returns the type of measurement that this unit is measuring.
     *
     * @return string
     */
    public function getUnitOf(): ?string;

    /**
     * Returns the amount of base units required to make up 1 of the unit.
     *
     * @return float
     */
    public function getUnits(): ?float;

    /**
     * Returns the unit's numeric value (how many of it there are).
     *
     * @return int|float|string
     */
    public function getValue();

    /**
     * Is the unit an SI multiple unit?
     *
     * @return boolean
     */
    public function isMultipleSiUnit(): bool;

    /**
     * Is the unit an SI base unit?
     *
     * @return boolean
     */
    public function isSiUnit(): bool;

    /**
     * Is the unit an SI submultiple unit?
     *
     * @return boolean
     */
    public function isSubmultipleSiUnit(): bool;

    /**
     * Sets the unit class that this unit is based off of.
     *
     * @param mixed $base The class that the unit is based on.
     * @return UnitInterface
     *
     * @example $this->setBase(Volume::class);
     */
    public function setBase($base): UnitInterface;

    /**
     * Sets the units full symantic name.
     *
     * @param string $name The value to be set as the units name
     * @return UnitInterface
     */
    public function setName(string $name): UnitInterface;

    /**
     * Sets the unicode scientific symbol notation used for the unit.
     *
     * @param string $scientificSymbol The unicode character to be set as the units scientific symbol
     * @return UnitInterface
     */
    public function setScientificSymbol(string $scientificSymbol): UnitInterface;

    /**
     * Sets the symbol notation used for the unit.
     *
     * @param string $symbol The value to be set as the units symbol
     * @return UnitInterface
     */
    public function setSymbol(string $symbol): UnitInterface;

    /**
     * Sets the type of measurement that this unit is measuring.
     *
     * @param string $unitOf The value to be set as the units governing unit
     * @return UnitInterface
     */
    public function setUnitOf(string $unitOf): UnitInterface;

    /**
     * Sets the amount of base units required to make up 1 of the unit.
     *
     * @param float $units The amount of units required to make a single base unit
     * @return UnitInterface
     */
    public function setUnits(float $units): UnitInterface;

    /**
     * Sets the unit's numeric value (how many of it are there?).
     *
     * @param int|float|string $value The numeric value to use.
     * @return UnitInterface
     */
    public function setValue($value): UnitInterface;
}

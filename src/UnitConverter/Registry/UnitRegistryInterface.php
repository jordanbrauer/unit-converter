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

namespace UnitConverter\Registry;

use UnitConverter\Unit\UnitInterface;

/**
 * The interface for the unit converter registry that stores units
 * and types of measurement.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @codeCoverageIgnore
 */
interface UnitRegistryInterface
{
    /**
     * Determine if a measurement type is registered to the unit registry or not.
     *
     * @api
     * @param string $measurement The name of the measurment being checked, e.g. "length".
     * @return bool
     */
    public function isMeasurementRegistered(string $measurement): bool;

    /**
     * Determine if a specific unit of measure is registered to the unit registry or not.
     *
     * @api
     * @param string $symbol The symbol notation of the unit being checked, e.g., "cm".
     * @return bool
     */
    public function isUnitRegistered(string $symbol): bool;

    /**
     * Return a one-dimensional array of currently supported measurement types.
     *
     * @api
     * @return array
     */
    public function listMeasurements(): array;

    /**
     * Return a one-dimensional array of currently supported units. Optionally
     * pass a string equal to a type of measurement (e.g. "length") to return
     * only units of the specifed type.
     *
     * @api
     * @param string $measurement
     * @return array
     */
    public function listUnits(string $measurement = null): array;

    /**
     * Fetch a unit from the unit registry for use elsewhere.
     *
     * @throws BadUnit If loading an unregistered unit is attempted.
     * @param string $symbol The symbol notation of the unit being loaded.
     * @return null|UnitInterface
     */
    public function loadUnit(string $symbol): ?UnitInterface;

    /**
     * Register a single measurement to the unit registry by passing a
     * string as the argument
     *
     * @NOTE In order to prevent unwanted overwritting of measurement
     * types (especially those with many registered units) - you must
     * unregister the measurement first with ::unregisterMeasurement().
     *
     * @param string $measurement
     * @return void
     */
    public function registerMeasurement(string $measurement): void;

    /**
     * Register many measurements to the unit registry by passing an
     * array of measurement strings as the argument
     *
     * @param array $measurements
     * @return void
     */
    public function registerMeasurements(array $measurements): void;

    /**
     * Register a single unit to the unit registry by passing an
     * instance of a UnitInterface as it's argument
     *
     * @param UnitInterface $unit
     * @throws BadMeasurement When an attempted unit registration is made on an unexisting measurement.
     * @return void
     */
    public function registerUnit(UnitInterface $unit): void;

    /**
     * Register many units to the unit registry by passing an array of unit
     * classes as it's argument.
     *
     * @param UnitInterface[] $units
     * @return void
     */
    public function registerUnits(array $units): void;

    /**
     * Unegister a single measurement from the unit registry.
     *
     * @NOTE: Invoking this method will also unregister all
     * units belonging to the measurement that is being unregistered.
     *
     * @param string $symbol
     * @throws BadMeasurement If you attempt to unregister a non-existing measurement type.
     * @return void
     */
    public function unregisterMeasurement(string $symbol): void;

    /**
     * Unegister many units from the unit registry
     *
     * @param string[] $symbols
     * @return void
     */
    public function unregisterMeasurements(array $symbols): void;

    /**
     * Unegister a single unit from the unit registry
     *
     * @param string $symbol
     * @throws BadUnit If you attempt to unregister a non-existing unit of measure.
     * @return void
     */
    public function unregisterUnit(string $symbol): void;

    /**
     * Unegister many units from the unit registry
     *
     * @param string[] $symbols
     * @return void
     */
    public function unregisterUnits(array $symbols): void;
}

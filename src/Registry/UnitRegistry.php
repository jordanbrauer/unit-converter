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

use UnitConverter\Exception\BadMeasurement;
use UnitConverter\Exception\BadRegistry;
use UnitConverter\Measure;
use UnitConverter\Support\Collection;
use UnitConverter\Unit\UnitInterface;

/**
 * The unit converter registry object. This object is used
 * to store and retrieve instances of the UnitInterface.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 */
class UnitRegistry implements UnitRegistryInterface
{
    /**
     * @var Collection $store A two-dimensional array containing available types of measuerment that each contain their available units of measure.
     */
    protected $store;

    /**
     * Public constructor function for the unit registry.
     *
     * @param UnitInterface[] $units A one-dimensional array of UnitInterface objects to be registered upon construction.
     * @return self
     */
    public function __construct(array $units = [])
    {
        $this->store = new Collection();

        $this->registerMeasurements(Measure::getDefaultMeasurements());
        $this->registerUnits($units);
    }

    /**
     * {@inheritDoc}
     */
    public function isMeasurementRegistered(string $measurement): bool
    {
        return $this->store->exists($measurement);
    }

    /**
     * {@inheritDoc}
     */
    public function isUnitRegistered(string $symbol): bool
    {
        foreach ($this->store as $measurement => $units) {
            if (array_key_exists($symbol, $units)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function listMeasurements(): array
    {
        return $this->store->keys();
    }

    /**
     * {@inheritDoc}
     */
    public function listUnits(string $measurement = null): array
    {
        if ($measurement) {
            return array_keys($this->store->get($measurement));
        }

        $registeredUnits = [];

        foreach ($this->store as $measurements) {
            $registeredUnits = array_merge($registeredUnits, $measurements);
        }

        return array_keys($registeredUnits);
    }

    /**
     * {@inheritDoc}
     */
    public function loadUnit(string $symbol): ?UnitInterface
    {
        if (!$this->isUnitRegistered($symbol)) {
            throw BadRegistry::unknown($symbol);
        }

        foreach ($this->store as $measurement => $units) {
            if (array_key_exists($symbol, $units)) {
                return $this->store->get("{$measurement}.{$symbol}");
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function registerMeasurement(string $measurement): void
    {
        if (!$this->isMeasurementRegistered($measurement)) {
            $this->store->push($measurement, []);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function registerMeasurements(array $measurements): void
    {
        foreach ($measurements as $measurement) {
            $this->registerMeasurement($measurement);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function registerUnit(UnitInterface $unit): void
    {
        $unitOf = $unit->getUnitOf();

        if (!$this->isMeasurementRegistered($unitOf)) {
            throw BadMeasurement::unknown($unitOf);
        }

        $symbol = $unit->getSymbol();

        if ($this->isUnitRegistered($symbol)) {
            throw BadRegistry::duplicate($symbol);
        }

        $this->store->push($unit->getRegistryKey(), $unit);
    }

    /**
     * {@inheritDoc}
     */
    public function registerUnits(array $units): void
    {
        foreach ($units as $unit) {
            $this->registerUnit($unit);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function unregisterMeasurement(string $measurement): void
    {
        if (!$this->isMeasurementRegistered($measurement)) {
            throw BadMeasurement::unknown($measurement);
        }

        $this->store->pop($measurement);
    }

    /**
     * {@inheritDoc}
     */
    public function unregisterMeasurements(array $measurements): void
    {
        foreach ($measurements as $measurement) {
            $this->unregisterMeasurement($measurement);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function unregisterUnit(string $symbol): void
    {
        if (!$this->isUnitRegistered($symbol)) {
            throw BadRegistry::unknown($symbol);
        }

        $this->store->pop($this->loadUnit($symbol)->getRegistryKey());
    }

    /**
     * {@inheritDoc}
     */
    public function unregisterUnits(array $symbols): void
    {
        foreach ($symbols as $unit) {
            $this->unregisterUnit($unit);
        }
    }
}

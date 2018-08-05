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

namespace UnitConverter;

/**
 * A static class containing constants that define the available
 * default types of measurement.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 * @codeCoverageIgnore
 */
class Measure
{
    const AREA = "area";

    const ENERGY = "energy";

    const LENGTH = "length";

    const MASS = "mass";

    const PLANE_ANGLE = "plane_angle";

    const PRESSURE = "pressure";

    const SPEED = "speed";

    const TEMPERATURE = "temperature";

    const TIME = "time";

    const VOLUME = "volume";

    /**
     * An array containing a list of default measurement types that are supported.
     *
     * @var array
     */
    private static $defaultMeasurements = [
        Measure::LENGTH,
        Measure::AREA,
        Measure::VOLUME,
        Measure::MASS,
        Measure::SPEED,
        Measure::PLANE_ANGLE,
        Measure::TEMPERATURE,
        Measure::PRESSURE,
        Measure::TIME,
        Measure::ENERGY,
    ];

    /**
     * Return a list of all default supported measurement types. These types
     * govern unit's of measurement.
     *
     * @return array
     */
    public static function getDefaultMeasurements(): array
    {
        return (static::$defaultMeasurements ?? []);
    }
}

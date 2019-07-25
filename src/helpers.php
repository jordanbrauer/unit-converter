<?php

declare(strict_types = 1);

use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\Unit\UnitInterface;

if (!\function_exists('convert')) {
    /**
     * Convert one unit to another, with optional precision.
     *
     * @param UnitInterface $from The unit to convert from.
     * @param UnitInterface $to The unit to convert into.
     * @param integer $precision Decimal place to calculate to, if possible.
     * @param boolean $binary Will use BC math to calculate results.
     * @return int|float|string
     */
    function convert(UnitInterface $from, UnitInterface $to, int $precision = null, bool $binary = false)
    {
        return $from->as($to, $precision, $binary);
    }
}

if (!\function_exists('centimetres')) {
    /**
     * Create a new instance of the Centimetre unit.
     *
     * @param integer $amount The amount of centimetres to represent.
     * @return Centimetre
     */
    function centimetres(int $amount = 1): Centimetre
    {
        return new Centimetre($amount);
    }
}

if (!\function_exists('inches')) {
    /**
     * Create a new instance of the Centimetre unit.
     *
     * @param integer $amount The amount of inches to represent.
     * @return Inch
     */
    function inches(int $amount = 1): Inch
    {
        return new Inch($amount);
    }
}

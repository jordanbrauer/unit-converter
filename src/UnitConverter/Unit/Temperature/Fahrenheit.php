<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Unit\Temperature;

use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Exception\BadUnit;
use UnitConverter\Unit\UnitInterface;

/**
 * Fahrenheit unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Fahrenheit extends TemperatureUnit
{
    protected function configure (): void
    {
        $this
            ->setName("fahrenheit")

            ->setSymbol("F")

            ->setScientificSymbol("°F")
            ;
    }

    protected function calculate (CalculatorInterface $calculator, $value, UnitInterface $to, int $precision = null)
    {
        $val = ($value ?? $this->getBase()->getUnits());
        $divisor = $calculator->div(5, 9);

        switch ($to->getSymbol()) { # 0 K = 255.372 °F
            case 'C': # °C = (°F - 32) × (5 ÷ 9)
                $result = $calculator->sub($val, 32);
                $result = $calculator->mul($result, $divisor);
                return $calculator->round($result, $precision);
                break;
            case 'K': # K = (°F + 459.67) × (5 ÷ 9)
                $result = $calculator->add($val, 459.67);
                $result = $calculator->mul($result, $divisor);
                return $calculator->round($result, $precision);
                break;
            case 'F': # °F = °F
                return $val;
                break;
            default:
                throw BadUnit::formula($to->getSymbol());
            }
        }
    }

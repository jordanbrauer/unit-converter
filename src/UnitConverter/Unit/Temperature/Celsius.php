<?php

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types = 1);

namespace UnitConverter\Unit\Temperature;

use Exception;
use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Unit\UnitInterface;

/**
 * Celsius unit data class.
 *
 * @version 1.0.0
 * @since 0.0.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class Celsius extends TemperatureUnit
{
    protected function configure (): void
    {
        $this
            ->setName("celsius")

            ->setSymbol("C")

            ->setScientificSymbol("°C")
            ;
    }

    protected function calculate (CalculatorInterface $calculator, $value, UnitInterface $to, int $precision = null)
    {
        $val = $value ?? $this->getBasetUnits();

        # 0 K = 273.15 °C
        switch ($to->getSymbol()) {
            case 'F': # °F = (°C × (9 ÷ 5)) + 32
                return $calculator->round(
                    $calculator->add(
                        $calculator->mul($val, $calculator->div(9, 5)),
                        32
                    ),
                    $precision
                );
                break;

            case 'K': # K = °C + 273.15
                return $calculator->round(
                    $calculator->add($val, 273.15),
                    $precision
                );
                break;

            case 'C': # °C = °C
                return $val;
                break;

            default:
                throw new Exception("Unknown conversion formula for {$to->getSymbol()}");
            }
        }
    }

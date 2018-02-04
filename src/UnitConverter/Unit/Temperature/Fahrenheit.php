<?php declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Unit\Temperature;

use Exception;
use UnitConverter\Calculator\CalculatorInterface;
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
        $val = $value ?? $this->getBase()->getUnits();

        # 0 K = 255.372 °F
        switch ($to->getSymbol()) {
            case 'C': # °C = (°F - 32) × (5 ÷ 9)
                return $calculator->round(
                    $calculator->mul(
                        $calculator->sub($val, 32),
                        $calculator->div(5, 9)
                    ),
                    $precision
                );
                break;

            case 'K': # K = (°F + 459.67) × (5 ÷ 9)
                return $calculator->round(
                    $calculator->mul(
                        $calculator->add($val, 459.67),
                        $calculator->div(5, 9)
                    ),
                    $precision
                );
                break;

            case 'F': # °F = °F
                return $val;
                break;

            default:
                throw new Exception("Unknown conversion formula for {$to->getSymbol()}");
            }
        }
    }

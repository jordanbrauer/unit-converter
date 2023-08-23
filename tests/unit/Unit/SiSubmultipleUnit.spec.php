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

use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;
use UnitConverter\Unit\Family\SiSubmultipleUnit;
use UnitConverter\Unit\Length\Metre;

$unit = new class() extends AbstractUnit implements SiSubmultipleUnit {
    protected $base = Metre::class;

    protected $name = "saiyan power";

    protected $scientificsymbol = "ω·m";

    protected $symbol = "sp";

    protected $unitof = Measure::LENGTH;

    protected $units = 9001;
};

test('SI submultiple units are SI base units')
    ->expect($unit)
    ->isSubmultipleSiUnit()
    ->toBeTrue();

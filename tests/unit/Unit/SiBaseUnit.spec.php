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
use UnitConverter\Unit\Family\SiUnit;
use UnitConverter\Unit\Length\Metre;

$unit = new class() extends AbstractUnit implements SiUnit {
    protected $base = Metre::class;

    protected $name = "saiyan power";

    protected $scientificSymbol = "Ω·m";

    protected $symbol = "sP";

    protected $unitOf = Measure::LENGTH;

    protected $units = 9001;
};

test('SI base units are SI base units')
    ->expect($unit)
    ->isSiUnit()
    ->toBeTrue();

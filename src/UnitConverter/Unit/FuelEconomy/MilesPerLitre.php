<?php


namespace UnitConverter\Unit\FuelEconomy;


use UnitConverter\Calculator\Formula\FuelEconomy\MilesPerLitre\ToKilometrePerLitre;
use UnitConverter\Calculator\Formula\FuelEconomy\MilesPerLitre\ToLitrePer100Kilometres;
use UnitConverter\Calculator\Formula\FuelEconomy\MilesPerLitre\ToMilesPerGallonImperial;
use UnitConverter\Calculator\Formula\FuelEconomy\MilesPerLitre\ToMilesPerGallonUS;
use UnitConverter\Calculator\Formula\NullFormula;

class MilesPerLitre extends FuelEconomyUnit
{
    protected function configure(): void
    {
        $this
            ->setName("miles per litre")

            ->setSymbol("mi/l")

            ->addFormulae([
                'L/100km' => ToLitrePer100Kilometres::class,
                'km/l' => ToKilometrePerLitre::class,
                'mpg' => ToMilesPerGallonUS::class,
                'mpg uk' => ToMilesPerGallonImperial::class,
                'mi/l' => NullFormula::class
            ]);
    }
}

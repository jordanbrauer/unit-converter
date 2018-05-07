<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "vendor/autoload.php";

use UnitConverter\Measure;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\AbstractUnit;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;

# Configuring a New Converter
# ===========================

$units = array(
  new Centimetre,
  new Inch,
);

$registry = new UnitRegistry($units);
$calculator = new SimpleCalculator;

$converter = new UnitConverter($registry, $calculator);

# Registering Custom Units
# ========================

$registry->registerUnit(new class extends AbstractUnit {
  protected function configure () : void
  {
    $this
      ->setName("testtt")
      ->setSymbol("Tst")
      ->setUnitOf(Measure::VOLUME)
      ->setBase(self::class)
      ->setUnits(1)
      ;
  }
});

# Converting Units
# ================

$conversion =
$converter
  ->convert(1)
  ->from("in")
  ->to("cm")
  ;

dump($conversion);
dump($converter->getConversionLog());

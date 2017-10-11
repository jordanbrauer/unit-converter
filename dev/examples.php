<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "vendor/autoload.php";

use UnitConverter\UnitConverter;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\AbstractUnit;
use UnitConverter\Measure;
use UnitConverter\Unit\Length\{
  Centimeter,
  Inch
};

# Configuring a New Converter
# ===========================

$units = array(
  new Centimeter,
  new Inch,
);

$registry = new UnitRegistry($units);

$converter = new UnitConverter($registry);

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

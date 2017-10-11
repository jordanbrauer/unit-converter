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
  protected $name = "testtt";
  protected $symbol = "Tst";
  protected $unitOf = Measure::VOLUME;
  protected $base = self::class;
  protected $units = 1;
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

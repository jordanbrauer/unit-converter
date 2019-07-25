<?php

declare(strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once \realpath(\rtrim(__DIR__, '/').'/../vendor/autoload.php');

use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Measure;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\AbstractUnit;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;
use UnitConverter\UnitConverter;

# -------------------------------------
# Quick Setup
# -------------------------------------

$converter = UnitConverter::createBuilder()
    ->addSimpleCalculator()
    ->addDefaultRegistry()
    ->build();

# -------------------------------------
# Advanced Setup
# -------------------------------------

$units = [
    new Centimetre(),
    new Inch(),
];

$registry = new UnitRegistry($units);
$calculator = new SimpleCalculator();
$converter = new UnitConverter($registry, $calculator);

# -------------------------------------
# Custom Units
# -------------------------------------

$registry->registerUnit(new class() extends AbstractUnit {
    protected function configure(): void
    {
        $this->setName('testtt')
            ->setSymbol('Tst')
            ->setUnitOf(Measure::VOLUME)
            ->setBase(self::class)
            ->setUnits(1);
    }
});

# -------------------------------------
# Converting Units
# -------------------------------------

$conversions = [
    "\$converter->convert(1, 2)->from('in')->to('cm');" => $converter->convert(1, 2)->from('in')->to('cm'),
    '(new Inch)->as(new Centimetre);'                   => (new Inch())->as(new Centimetre()),
    'inches()->as(centimetres());'                      => inches()->as(centimetres()),
    'convert(inches(), centimetres());'                 => convert(inches(), centimetres()),
];

$strings = array_keys($conversions);
$pad = array_reduce($strings, function (?int $longest, string $code): int {
    $length = strlen($code);

    return ($length > $longest) ? $length : $longest;
});

foreach ($conversions as $code => $result) {
    echo PHP_EOL.' '.str_pad($code, (1 + $pad), ' ').'# ('.gettype($result).') '.$result.PHP_EOL;
}

# -------------------------------------
# Debugging
# -------------------------------------

$conversions = $converter->getConversionLog();

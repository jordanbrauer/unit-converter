# unit-converter

[![Latest Stable Version](https://poser.pugx.org/jordanbrauer/unit-converter/version)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![Latest Unstable Version](https://poser.pugx.org/jordanbrauer/unit-converter/v/unstable)](//packagist.org/packages/jordanbrauer/unit-converter)
[![Build Status](https://travis-ci.org/jordanbrauer/unit-converter.svg?branch=master)](https://travis-ci.org/jordanbrauer/unit-converter)
[![Code Climate](https://img.shields.io/codeclimate/coverage/github/jordanbrauer/unit-converter.svg)]()
[![Code Climate](https://img.shields.io/codeclimate/maintainability/jordanbrauer/unit-converter.svg)]()
[![composer.lock available](https://poser.pugx.org/jordanbrauer/unit-converter/composerlock)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![Total Downloads](https://poser.pugx.org/jordanbrauer/unit-converter/downloads)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![License](https://poser.pugx.org/jordanbrauer/unit-converter/license)](https://packagist.org/packages/jordanbrauer/unit-converter)

Convert all kinds of standard units of measurement from one to another with this highly customizable, easy to use, lightweight PHP component.

**[API Documentation](https://jordanbrauer.github.io/unit-converter/)**

**Table of Contents:**

1. About the Component
2. Installing the Component
3. Using the Component

### 1. About the Component

This unit converter component aims to be modern and follow best practices where possible.

It supports the following types of measurement by default (support for more measurement types are on the roadmap).

* Area
* Energy (Power)
* Length
* Mass (Weight)
* Plane Angle (Rotation)
* Pressure
* Speed
* Temperature
* Time
* Volume

You also have the ability to [add your own measurements](#adding-custom-units)!

### 2. Installing the Component

The only way to install this component is via Composer.

#### Composer

```
$ composer require jordanbrauer/unit-converter
```

### 3. Using the Component

Using the component is very easy, especially if you have used the Symfony framework before.

#### Setup

```php
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;

# An array of measurements being registered to the converter
$units = array(
  new Centimetre,
  new Inch,
);

# Instantiate a new UnitRegistry and seed it with our array
$registry = new UnitRegistry($units);
$calculator = new SimpleCalculator;

# Instantiate the UnitConverter, passing it the registry
$converter = new UnitConverter($registry, $calculator);
```

#### Converting Units

```php
# Using the converter we constructed in our setup example
# we will convert 1 inch into centimetres (which is 2.54cm)
$conversion =
$converter
  ->convert(1)
  ->from("in")
  ->to("cm")
  ;

# Dumping the result will show us that the conversion worked as expected
var_dump($conversion); # (float) 2.54
```

#### Adding Custom Units

You are able to add your own custom units to the unit registry. The unit converter and registry are flexible enough to allow for you to create your own unit of measure classes, or register them on the fly as needed.

```php
use UnitConverter\Measure;
use UnitConverter\Unit\AbstractUnit;

# Using the same registry we passed to the converter!
$registry->registerUnit(new class extends AbstractUnit {
  protected function configure () : void
  {
    $this
      ->setName("gigawatt")
      ->setSymbol("gw")
      ->setUnitOf(Measure::ENERGY)
      ->setBase(self::class)
      ->setUnits(1.21)
      ;
  }
});
```

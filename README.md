# Unit Converter

[![Latest Stable Version](https://poser.pugx.org/jordanbrauer/unit-converter/version)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![Latest Unstable Version](https://poser.pugx.org/jordanbrauer/unit-converter/v/unstable)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![composer.lock unavailable](https://poser.pugx.org/jordanbrauer/unit-converter/composerlock)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![Total Downloads](https://poser.pugx.org/jordanbrauer/unit-converter/downloads)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![License](https://poser.pugx.org/jordanbrauer/unit-converter/license)](https://choosealicense.com/licenses/mit/)

[![Build Status](https://travis-ci.org/jordanbrauer/unit-converter.svg?branch=master)](https://travis-ci.org/jordanbrauer/unit-converter)
[![Test Coverage](https://api.codeclimate.com/v1/badges/0b4639967df0b1578734/test_coverage)](https://codeclimate.com/github/jordanbrauer/unit-converter/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/0b4639967df0b1578734/maintainability)](https://codeclimate.com/github/jordanbrauer/unit-converter/maintainability)
<!-- [![Code Climate](https://img.shields.io/codeclimate/coverage/github/jordanbrauer/unit-converter.svg)](https://codeclimate.com/github/jordanbrauer/unit-converter) -->
<!-- [![Code Climate](https://img.shields.io/codeclimate/maintainability/jordanbrauer/unit-converter.svg)](https://codeclimate.com/github/jordanbrauer/unit-converter) -->

<br />

Convert all kinds of standard units of measurement from one to another with this highly customizable, easy to use, lightweight PHP component.

**Table of Contents:**

1. About the Component
2. Installing the Component
3. Basic Usage
4. Documentation

## 1. About the Component

This unit converter component aims to be modern and follow best practices. It also aims to be fully SI compliant (eventually...).

It supports the following types of measurement by default (support for more measurement types are on the roadmap).

- Area
- Data Transfer Rates _Coming Soon!_
- Digital Storage _Coming Soon!_
- Energy (Power)
- Frequency _Coming Soon!_
- Fuel Economy _Coming Soon!_
- Length
- Mass (Weight)
- Plane Angle (Rotation)
- Pressure
- Speed
- Temperature
- Time
- Volume

You also have the ability to override & customize the default units, as well as [add your own](#adding-custom-units)!

## 2. Installing the Component

The only way to install this component is via Composer.

### Composer

```
$ composer require jordanbrauer/unit-converter
```

## 3. Basic Usage

Using the component is very easy, especially if you have used the Symfony framework before.

### Setup

There are **three** main classes that make up a `UnitConverter`.

- `UnitConverter\UnitConverter`: The actual unit converter, itself; provides a nice interface for converting units programatically. It depends on a registry, and a calculator.
- `UnitConverter\Registry\UnitRegistry`: The unit registry handles the storing, sorting, and displaying of registered units.
- `UnitConverter\Calculator\SimpleCalculator`: The calculator(s) (more on alternatives later) handle the actual number crunching for the unit converter, unless a unit has to convert itself with a unique formula, e.g., temperature.

#### The Unit Registry

First, you'll want to have a list of units that you require conversion for.

For this example, we will be converting an imperial inch, into a metric centimetre, using the built in `Centimetre` and `Inch` classes. To start, lets setup our unit converters' registry.

```php
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Centimetre;
use UnitConverter\Unit\Length\Inch;

# Start by creating an array of measurements you want to register to the converter.
# Then, we will instantiate a new UnitRegistry and pass the array to it as it's only argument.

$units = [ new Centimetre, new Inch, ];
$registry = new UnitRegistry($units);
```

#### The Calculators

As well know, computers are not the best with decimal values (floats). When converting units of measurement, we often deal with decimal values. Depending on how precise of a result you require, will depend on what sort of calculator implementation suits you.

This package comes bundled with two calculators for you; the `SimpleCalculator`, and the `BinaryCalculator`. They both aim to solve two different problems with numbers.

The `SimpleCalculator` is the default calculator, and will run calculations on integers, floats, and (somtimes) strings, but will not guarantee the best accuracy on results. The `BinaryCalculator` leverages the PHP [bcmath library](http://php.net/manual/en/book.bc.php) to perform accurate floating point calculations, the catch being that it's parameters must be strings.

```php
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Calculator\BinaryCalculator;

# We will use the SimpleCalculator for this example, but the BinaryCalculator is setup exactly
# the same way.

$calculator = new SimpleCalculator;
```

#### The Unit Converter

The actual unit converter does not do a whole lot, other than provide a nice interface for converting units, and use the registry and calculator in conjuntion.

```php
use UnitConverter\UnitConverter;

# Instantiate the UnitConverter, passing it the registry and calculator.
$converter = new UnitConverter($registry, $calculator);
```

And presto! You have ourself a configured unit converter component. Store this in your application DI/IOC container for easy acces.

### Usage

Using the component is really easy. We'll go through the features one by one.

#### Converting Units

The first and most obvious feature is the ability to convert units. Using the configured converter we set up in the examples above, we can convert 1 inch to centimetres using the three methods, `convert()`, `from()`, and `to()`. They're used like so,

```php
# Using the converter we constructed in our setup example we will convert 1 inch into
# centimetres (which is 2.54cm).

$conversion = $converter->convert(1)->from("in")->to("cm");

# Dumping the result will show us that the conversion worked as expected
var_dump($conversion); # (float) 2.54
```
Easy as pie! Lets break it down though.

##### convert(int|float|string $value)

The `convert` methods takes the value that you are converting. Simple as that.

If you are using the `SimpleCalculator`, you can pass your value as any type. If you're using the `BinaryCalculator`, you can only pass strings.

##### from(string $symbol)

The `from` method takes the symbol of the unit of measure paired with your value passed to `convert`. To get the symbol of a unit dynamically, call the `getSymbol()` method on a unit.

##### to(string $symbol)

The `to` method does exactly what the from method does, except that it takes the symbol of the unit you are converting to.

It must called as the last method in the chain. It returns the result of the conversion from the calculator.

#### Customizing &amp; Extending Default Units

Customizing and extending the default units that come with this package is incredably easy. Each unit not only has getters, but has matching setters for reconfiguring it's symbols, and values to suit your data needs.

Here is an example of adjusting a unit's values, for perhaps spelling purposes.

```php
use UnitConverter\Unit\Length\Centimetre as Centimeter;

$centimeter = new Centimeter;
$centimeter->getName(); # centimetre
$centimeter->setName("centimeter");
$centimeter->getName(); # centimeter
```

Checkout the API documentation for details on all the methods available to units.

#### Adding Your Own Custom Units

You are able to add your own custom units to the unit registry. The unit converter and registry are flexible enough to allow for you to create your own unit of measure classes, or register them on the fly as needed.

```php
use UnitConverter\Unit\Energy\EnergyUnit;

class Gigawatt extends EnergyUnit
{
  protected function configure (): void
  {
    $this
      ->setName("gigawatt")
      ->setSymbol("gw")
      ->setUnits(1.21)
      ;
  }
}
```

### Debugging

_Coming Soon!_

## 4. Documentation

#### API Documentation

If you are looking to extend and hack on this component for your own project, these pages will give you insight into all about how the component works, through the awesome power of dockblocks!

[API Documentation](https://jordanbrauer.github.io/unit-converter/)

#### User Documentation

In-depth examples, tutorials, and explanations on the component for users who are looking to integrate it into their project, as-is.

~[User Documentation](#user-documentation)~ _Coming Soon!_

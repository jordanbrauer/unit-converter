# Unit Converter

[![Latest Stable Version](https://img.shields.io/packagist/v/jordanbrauer/unit-converter?color=257ec2&label=stable&style=flat-square)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![Latest Unstable Version](https://poser.pugx.org/jordanbrauer/unit-converter/v/unstable?format=flat-square)](//packagist.org/packages/jordanbrauer/unit-converter)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/jordanbrauer/unit-converter?color=8892be&style=flat-square)](https://secure.php.net/releases/)
[![composer.lock available](https://poser.pugx.org/jordanbrauer/unit-converter/composerlock?format=flat-square)](https://packagist.org/packages/jordanbrauer/unit-converter)
[![license](https://img.shields.io/github/license/jordanbrauer/unit-converter.svg?style=flat-square)](https://github.com/jordanbrauer/unit-converter/blob/master/LICENSE)

[![CI Workflow](https://img.shields.io/github/workflow/status/jordanbrauer/unit-converter/CI?style=flat-square&label=tests)](https://github.com/jordanbrauer/unit-converter/actions?query=workflow%3ACI)
[![Code Maintainability](https://img.shields.io/codeclimate/maintainability/jordanbrauer/unit-converter.svg?style=flat-square)](https://codeclimate.com/github/jordanbrauer/unit-converter)
[![Code Coverage](https://img.shields.io/codeclimate/coverage/jordanbrauer/unit-converter.svg?style=flat-square)](https://codeclimate.com/github/jordanbrauer/unit-converter)
[![Technical Debt](https://img.shields.io/codeclimate/tech-debt/jordanbrauer/unit-converter.svg?style=flat-square)](https://codeclimate.com/github/jordanbrauer/unit-converter/issues)
[![Maintenance](https://img.shields.io/maintenance/yes/2021.svg?style=flat-square)](https://github.com/jordanbrauer/unit-converter)
[![Packagist](https://img.shields.io/packagist/dt/jordanbrauer/unit-converter.svg?style=flat-square)](https://packagist.org/packages/jordanbrauer/unit-converter)

<br />

Convert all kinds of standard units of measurement from one to another with this highly customizable, easy to use, lightweight PHP component.

**Table of Contents:**

1. [About the Component](#1-about-the-component)
2. [Installing the Component](#2-installing-the-component)
3. [Basic Usage](#3-basic-usage)
4. [Documentation](#4-documentation)

## 1. About the Component

This unit converter component aims to be modern and follow best practices. It also aims to be fully SI compliant (eventually...).

It supports the following types of measurement by default (support for more measurement types are on the roadmap).

- Area
- Data Transfer Rates _Coming Soon!_
- Digital Storage **_New!_**
- Energy (Power)
- Frequency
- Fuel Economy
- Length
- Mass (Weight)
- Plane Angle (Rotation)
- Pressure
- Speed
- Temperature
- Time
- Volume

You also have the ability to override & customize the default units, as well as [add your own](https://github.com/jordanbrauer/unit-converter/wiki/Unit-Customization-&-Extension#adding-your-own-custom-units)!

## 2. Installing the Component

The best way to install the component is with Composer. For other supported methods, [see the wiki](https://github.com/jordanbrauer/unit-converter/wiki/Installing-the-Package) artile on installation.

```
$ composer require jordanbrauer/unit-converter
```

## 3. Basic Usage

Using the component is very easy, especially if you have used the Symfony or Laravel frameworks before.

### Quick-Start

If you'd like to skip the minutiae of this component's setup and get right down to business, you can get started by constructing a pre-configured converter via static constructors or the builder object, like so,

###### Static Constructors

```php
use UnitConverter\UnitConverter;

$converter = UnitConverter::default(); # simple calculator
$converter = UnitConverter::binary(); # binary calculator (BC math)
```

###### Builder

```php
use UnitConverter\UnitConverter;

$converter = UnitConverter::createBuilder()
    ->addSimpleCalculator()
    ->addDefaultRegistry()
    ->build();
```

and use it like this,

```php
$converter->convert(1)->from("in")->to("cm"); # (float) 2.54
```

and you're done! For a more in-depth setup guide, [**check the wiki**](https://github.com/jordanbrauer/unit-converter/wiki).

### Usage Examples

Here are where some usage examples of something that may fit more along the lines of _"real-life"_, are found. Keep in mind that the code examples in each use-case, while working & valid, do contain **some** pseudo-code in them for demonstration purposes.

#### The Traffic Camera

In this example, pretend we have a traffic camera that only captures speeds in Imperial measurement of _miles per hour_. The traffic camera records each passing car's speed to determine if they were speeding & if so, snap a photo of their license plate as proof to serve a ticket. In this case, the camera caught a speed of `59` _miles per hour_.

Here we construct a new unit & give it a value representing how many of the unit exists,

```php
$capturedSpeed = new MilePerHour(59);
```

Next, a conversion of units needs to take place, because this traffic camera model is being used in a country that uses the metric system.

As you can see in this example, we are leveraging the power of typehints to ensure we only receive units of the desired measurement. Inside of the closure, we are using one of the unit's most convenient & powerful methods: `as()`. It allows us to convert units without the direct use of the `UnitConverter` & `UnitRegistry` objects – giving the benefit of even cleaner code & type safety.

```php
$isOverSpeedLimit = function (SpeedUnit $speed) {
    return $speed->as(new KilometrePerHour) > 50;
};

if ($isOverSpeedLimit($capturedSpeed)) { # (bool) true
    TrafficCamera::snapPhoto();
}
```

#### Conversion Results as Words

Sometimes you might need localization support for values. This component makes that a breeze by making using the `intl` extension. Simply opt for using the `spellout` method in lieu of `to`. You may also provide an optional locale as the second parameter to translate.

```php
$converter->convert(1)->from('in')->spellout('cm');       # (string) two point five four
$converter->convert(1)->from('in')->spellout('cm', 'fr'); # (string) deux virgule cinq quatre
```

## 4. Documentation

There are two kinds of in-depth documentation for this project: user & API documentation. Use whichever one you need to help answer your questions!

### User Documentation

Setup guides, in-depth examples, tutorials, and explanations on the component for users who are looking to integrate it into their project, as-is.

[User Documentation](https://github.com/jordanbrauer/unit-converter/wiki)

### API Documentation

If you are looking to extend and hack on this component for your own project, these pages will give you insight into all about how the component works, through the awesome power of dockblocks!

[API Documentation](https://jordanbrauer.github.io/unit-converter/)

### v0.4.0

* Implement Kilopascal and Megapascal and write tests (#29) e1bc33c (@arubacao)
* remove composer.lock from repo and add it to .gitignore (#30) 37e0f01 (@arubacao)
* Fix: add missing self conversions for temperature units (#31) 380bdb7
* Feature/improve travis file (#32) 707fb0a (@arubacao)
* Adding energy units (#33) 0860032 (@andrewboerema)
* Added millibar as pressure unit (#34) 9a6eed0 (@teunw)
* Added time measurements (#35) 611293e (@teunw)
* Feat: add simple contributing guide for now (#36) cd71bbc
* Added last weight measures (#37) dc7021e (@teunw)
* Add first set of dev docs (#44) ca74697
* scientificSymbol property, getter and setter are added (#47) 19837f1 (@luchianenco)
* Upgrade: docs & composer version 7c553ad
* Fix: Energy integration test - wrong unit case for Joule 708f021

### v0.3.9-beta

* Base working package (#26)
* Feat: add speed base unit
* Feat: add support for metre per second units
* Feat: add support for kilometer per hour units
* Feat: add support for miles per hour units
* Fix: name spelling
* Fix: swap units of miles and kilometres per hour
* Fix: all units now use configure() method to configure data
* Feat: add base temperature unit class
* Feat: add kelvin temperature unit
* Feat: add support for celsius
* Feat: add support for fahrenheit units
* Fix: using new ::configure() method over explicit value definitions
* Fix: configure method definition
* Update: add conversion formulae to calculate methods
* Feat: add integration test for temp' units - damn °C <-> °F conversions
* Fix: returned getter to being just that; a getter.
* Feat: convert() method to expose calculate() - allows for complex calcs
* Feat: add switch for conditional calculations based upon temp' unit
* Fix: improper namespace
* Feat: add base volume unit class + integration test
* Feat: add support for litre units
* Feat: add support for mililitre units
* Feat: add support for US liquid pint units
* Feat: add support for US Liquid gallon units
* Feat: add support for cubic metre units
* Fix: misnamed test file
* Feat: add support for basic pressure units w/ single integration test
* Feat: add basic energy units
* Feat: add gram unit support
* Feat: add base mass unit class
* Feat: add kilogram unit support
* Fix: changed use of "weight" with "mass"
* Feat: add support for milligram units
* Feat: add support for Newton units
* Feat: add support for Pound units
* Feat: add support for ounce units
* Feat: add support for metric tonne units
* Update: move example file
* Feat: add phpdoc configurations
* Fix: broken tests using incorrect type of measure for mass, was 'volume'
* Update: temporary readme 'overhaul'
* Upgrade: package version

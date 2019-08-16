# Change Log

## [v0.8.3](https://github.com/jordanbrauer/unit-converter/tree/v0.8.3) (2019-08-16)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.8.2...v0.8.3)

**Fixed bugs:**

- Regression after merge \#fix-127-trampled-units [\#139](https://github.com/jordanbrauer/unit-converter/issues/139)
- Fix regression bug \#139 [\#140](https://github.com/jordanbrauer/unit-converter/pull/140) ([jordanbrauer](https://github.com/jordanbrauer))

**Merged pull requests:**

- Bump js-yaml from 3.12.0 to 3.13.1 [\#138](https://github.com/jordanbrauer/unit-converter/pull/138) ([dependabot[bot]](https://github.com/apps/dependabot))
- Bump lodash from 4.17.11 to 4.17.15 [\#137](https://github.com/jordanbrauer/unit-converter/pull/137) ([dependabot[bot]](https://github.com/apps/dependabot))

## [v0.8.2](https://github.com/jordanbrauer/unit-converter/tree/v0.8.2) (2019-07-26)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.8.1...v0.8.2)

**Fixed bugs:**

- registry tramples units with the same symbol [\#127](https://github.com/jordanbrauer/unit-converter/issues/127)

**Merged pull requests:**

- Circle ci [\#134](https://github.com/jordanbrauer/unit-converter/pull/134) ([jordanbrauer](https://github.com/jordanbrauer))
- Fix/fuel economy units fixes [\#133](https://github.com/jordanbrauer/unit-converter/pull/133) ([maksimru](https://github.com/maksimru))
- Fix 127 trampled units [\#132](https://github.com/jordanbrauer/unit-converter/pull/132) ([jordanbrauer](https://github.com/jordanbrauer))
- raise error for units attempted to be overwritten [\#131](https://github.com/jordanbrauer/unit-converter/pull/131) ([jordanbrauer](https://github.com/jordanbrauer))
- Primitive units [\#129](https://github.com/jordanbrauer/unit-converter/pull/129) ([jordanbrauer](https://github.com/jordanbrauer))
- Add common builders for simple and binary calculators [\#126](https://github.com/jordanbrauer/unit-converter/pull/126) ([elliotwms](https://github.com/elliotwms))

## [v0.8.1](https://github.com/jordanbrauer/unit-converter/tree/v0.8.1) (2018-12-09)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.8.0...v0.8.1)

**Implemented enhancements:**

- Convert a unit to all other possible units of measurement. [\#119](https://github.com/jordanbrauer/unit-converter/issues/119)
- Add support for units of measurement, Fuel Economy [\#42](https://github.com/jordanbrauer/unit-converter/issues/42)
- Add support for units of measurement, Frequency [\#41](https://github.com/jordanbrauer/unit-converter/issues/41)
- Expose api [\#124](https://github.com/jordanbrauer/unit-converter/pull/124) ([jordanbrauer](https://github.com/jordanbrauer))
- Add support for units of measurement, Frequency [\#123](https://github.com/jordanbrauer/unit-converter/pull/123) ([jmauerhan](https://github.com/jmauerhan))
- Convert to all [\#121](https://github.com/jordanbrauer/unit-converter/pull/121) ([jordanbrauer](https://github.com/jordanbrauer))
- Refactor calculate [\#116](https://github.com/jordanbrauer/unit-converter/pull/116) ([jordanbrauer](https://github.com/jordanbrauer))

**Fixed bugs:**

- Temperature conversions do not work with BinaryCalculator [\#118](https://github.com/jordanbrauer/unit-converter/issues/118)

**Closed issues:**

- Fix "method\_complexity" issue in src/UnitConverter/UnitConverter.php [\#96](https://github.com/jordanbrauer/unit-converter/issues/96)
- Performance metrics/benchmarks? [\#77](https://github.com/jordanbrauer/unit-converter/issues/77)

**Merged pull requests:**

- add php metrics library for static code analysis [\#125](https://github.com/jordanbrauer/unit-converter/pull/125) ([jordanbrauer](https://github.com/jordanbrauer))
- \#42 : Add support for units of measurement, Fuel Economy  \(\#1\) [\#117](https://github.com/jordanbrauer/unit-converter/pull/117) ([Progi1984](https://github.com/Progi1984))

## [v0.8.0](https://github.com/jordanbrauer/unit-converter/tree/v0.8.0) (2018-08-06)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.7.1...v0.8.0)

**Implemented enhancements:**

- Array dot notation for Collection [\#100](https://github.com/jordanbrauer/unit-converter/issues/100)
- Array dot notation [\#102](https://github.com/jordanbrauer/unit-converter/pull/102) ([jordanbrauer](https://github.com/jordanbrauer))

**Fixed bugs:**

- \[7.0.1\]\[FatalErrorException\] BinaryCalculator::round must be compatible with UnitConverter\Calculator\AbstractCalculator::round [\#115](https://github.com/jordanbrauer/unit-converter/issues/115)
- Self-converting units \(such as temperature\) are not logged [\#105](https://github.com/jordanbrauer/unit-converter/issues/105)

**Closed issues:**

- Fix "method\_lines" issue in src/UnitConverter/ConverterBuilder.php [\#113](https://github.com/jordanbrauer/unit-converter/issues/113)
- missing the createBuilder method when installing through composer [\#107](https://github.com/jordanbrauer/unit-converter/issues/107)
- Add PHP CS Fixer to project [\#101](https://github.com/jordanbrauer/unit-converter/issues/101)
- Fix "method\_lines" issue in src/UnitConverter/UnitConverter.php [\#97](https://github.com/jordanbrauer/unit-converter/issues/97)

**Merged pull requests:**

- Fix method lines [\#114](https://github.com/jordanbrauer/unit-converter/pull/114) ([jordanbrauer](https://github.com/jordanbrauer))
- Fix self conversion logs [\#112](https://github.com/jordanbrauer/unit-converter/pull/112) ([jordanbrauer](https://github.com/jordanbrauer))
- Improved exceptions [\#110](https://github.com/jordanbrauer/unit-converter/pull/110) ([jordanbrauer](https://github.com/jordanbrauer))
- Readme badges [\#109](https://github.com/jordanbrauer/unit-converter/pull/109) ([jordanbrauer](https://github.com/jordanbrauer))
- Php cs fixer [\#108](https://github.com/jordanbrauer/unit-converter/pull/108) ([jordanbrauer](https://github.com/jordanbrauer))

## [v0.7.1](https://github.com/jordanbrauer/unit-converter/tree/v0.7.1) (2018-08-03)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.7.0...v0.7.1)

**Implemented enhancements:**

- List all suported units [\#98](https://github.com/jordanbrauer/unit-converter/issues/98)

**Closed issues:**

- Instantiate registry with all units [\#99](https://github.com/jordanbrauer/unit-converter/issues/99)

**Merged pull requests:**

- Add coverage annotation to exceptions [\#106](https://github.com/jordanbrauer/unit-converter/pull/106) ([jordanbrauer](https://github.com/jordanbrauer))
- Converter builder and fully loaded registry [\#104](https://github.com/jordanbrauer/unit-converter/pull/104) ([proualexandre](https://github.com/proualexandre))

## [v0.7.0](https://github.com/jordanbrauer/unit-converter/tree/v0.7.0) (2018-05-07)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.6.7...v0.7.0)

**Implemented enhancements:**

- Add methods to Time units for determining leaps [\#70](https://github.com/jordanbrauer/unit-converter/issues/70)
- Introduce a debugging method with nice output [\#69](https://github.com/jordanbrauer/unit-converter/issues/69)
- Implement new Unit property "siUnit" to indicate the units SI acceptance [\#60](https://github.com/jordanbrauer/unit-converter/issues/60)
- Si units [\#86](https://github.com/jordanbrauer/unit-converter/pull/86) ([jordanbrauer](https://github.com/jordanbrauer))

**Closed issues:**

- Fix "method\_lines" issue in src/UnitConverter/UnitConverter.php [\#94](https://github.com/jordanbrauer/unit-converter/issues/94)
- Fix "method\_lines" issue in src/UnitConverter/UnitConverter.php [\#93](https://github.com/jordanbrauer/unit-converter/issues/93)
- Fix "method\_complexity" issue in src/UnitConverter/UnitConverter.php [\#92](https://github.com/jordanbrauer/unit-converter/issues/92)
- Update README to have more information for setup/usage.  [\#68](https://github.com/jordanbrauer/unit-converter/issues/68)
- Implement a better release workflow [\#58](https://github.com/jordanbrauer/unit-converter/issues/58)
- Fix "method\_lines" issue in src/UnitConverter/Unit/Temperature/Fahrenheit.php [\#57](https://github.com/jordanbrauer/unit-converter/issues/57)
- Fix "argument\_count" issue in src/UnitConverter/UnitConverter.php [\#56](https://github.com/jordanbrauer/unit-converter/issues/56)
- Enforce a standard such as SI for unit of measure notations \(symbols\) [\#45](https://github.com/jordanbrauer/unit-converter/issues/45)

**Merged pull requests:**

- reduce lines in calculate method \(closes \#57\) [\#95](https://github.com/jordanbrauer/unit-converter/pull/95) ([jordanbrauer](https://github.com/jordanbrauer))
- Repo files [\#91](https://github.com/jordanbrauer/unit-converter/pull/91) ([jordanbrauer](https://github.com/jordanbrauer))
- Temporarily use vanilla codeclimate badges due to shields.io bug [\#90](https://github.com/jordanbrauer/unit-converter/pull/90) ([jordanbrauer](https://github.com/jordanbrauer))
- Debugging tools [\#89](https://github.com/jordanbrauer/unit-converter/pull/89) ([jordanbrauer](https://github.com/jordanbrauer))
- Time helpers [\#88](https://github.com/jordanbrauer/unit-converter/pull/88) ([jordanbrauer](https://github.com/jordanbrauer))

## [v0.6.7](https://github.com/jordanbrauer/unit-converter/tree/v0.6.7) (2018-05-06)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.6.2-rc...v0.6.7)

**Merged pull requests:**

- Release fixes [\#83](https://github.com/jordanbrauer/unit-converter/pull/83) ([jordanbrauer](https://github.com/jordanbrauer))

## [v0.6.2-rc](https://github.com/jordanbrauer/unit-converter/tree/v0.6.2-rc) (2018-05-06)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.6.1...v0.6.2-rc)

**Fixed bugs:**

- Upgrades to support a pre-release tag [\#82](https://github.com/jordanbrauer/unit-converter/pull/82) ([jordanbrauer](https://github.com/jordanbrauer))

## [v0.6.1](https://github.com/jordanbrauer/unit-converter/tree/v0.6.1) (2018-05-06)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.6.0...v0.6.1)

**Implemented enhancements:**

- Add collection class for unit registry [\#75](https://github.com/jordanbrauer/unit-converter/issues/75)
- Develop – Minor version change [\#81](https://github.com/jordanbrauer/unit-converter/pull/81) ([jordanbrauer](https://github.com/jordanbrauer))
- Robofile taskrunner [\#80](https://github.com/jordanbrauer/unit-converter/pull/80) ([jordanbrauer](https://github.com/jordanbrauer))
- Robofile taskrunner [\#78](https://github.com/jordanbrauer/unit-converter/pull/78) ([jordanbrauer](https://github.com/jordanbrauer))

**Fixed bugs:**

- BinaryCalculator requires UnitConverter to pass string values instead of int/float values  [\#54](https://github.com/jordanbrauer/unit-converter/issues/54)

**Closed issues:**

- Code style updates [\#67](https://github.com/jordanbrauer/unit-converter/issues/67)

**Merged pull requests:**

- Revert "Robofile taskrunner" [\#79](https://github.com/jordanbrauer/unit-converter/pull/79) ([jordanbrauer](https://github.com/jordanbrauer))
- Unit collection [\#76](https://github.com/jordanbrauer/unit-converter/pull/76) ([jordanbrauer](https://github.com/jordanbrauer))
- Update: outdated readme info & add new info [\#74](https://github.com/jordanbrauer/unit-converter/pull/74) ([jordanbrauer](https://github.com/jordanbrauer))
- Fix code styles [\#71](https://github.com/jordanbrauer/unit-converter/pull/71) ([jordanbrauer](https://github.com/jordanbrauer))

## [v0.6.0](https://github.com/jordanbrauer/unit-converter/tree/v0.6.0) (2018-02-04)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.5.1...v0.6.0)

**Closed issues:**

- Need a New Pull Request template [\#62](https://github.com/jordanbrauer/unit-converter/issues/62)
- Need a New Issue template [\#61](https://github.com/jordanbrauer/unit-converter/issues/61)

**Merged pull requests:**

- Release 0.6.0 [\#66](https://github.com/jordanbrauer/unit-converter/pull/66) ([jordanbrauer](https://github.com/jordanbrauer))
- Fix binary calc [\#64](https://github.com/jordanbrauer/unit-converter/pull/64) ([jordanbrauer](https://github.com/jordanbrauer))
- GitHub templates [\#63](https://github.com/jordanbrauer/unit-converter/pull/63) ([jordanbrauer](https://github.com/jordanbrauer))

## [v0.5.1](https://github.com/jordanbrauer/unit-converter/tree/v0.5.1) (2017-11-14)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.5.0...v0.5.1)

**Closed issues:**

- Add missing unit of measurement integration tests  [\#59](https://github.com/jordanbrauer/unit-converter/issues/59)

## [v0.5.0](https://github.com/jordanbrauer/unit-converter/tree/v0.5.0) (2017-11-13)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.4.1...v0.5.0)

**Implemented enhancements:**

- Dev documentation for API + examples [\#43](https://github.com/jordanbrauer/unit-converter/issues/43)
- Include the use of bcmath for floating point precision [\#12](https://github.com/jordanbrauer/unit-converter/issues/12)
-  Feat: implement calculator into unit converter & unit calculate methods [\#53](https://github.com/jordanbrauer/unit-converter/pull/53) ([jordanbrauer](https://github.com/jordanbrauer))
- Feat: add explicit calculator classes to handle all math related operations [\#52](https://github.com/jordanbrauer/unit-converter/pull/52) ([jordanbrauer](https://github.com/jordanbrauer))

**Closed issues:**

- Need a Changelog of sorts [\#28](https://github.com/jordanbrauer/unit-converter/issues/28)

**Merged pull requests:**

- Upgrade: pull in development changes [\#55](https://github.com/jordanbrauer/unit-converter/pull/55) ([jordanbrauer](https://github.com/jordanbrauer))

## [v0.4.1](https://github.com/jordanbrauer/unit-converter/tree/v0.4.1) (2017-11-12)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.4.0...v0.4.1)

**Implemented enhancements:**

- Feat: add changelog [\#49](https://github.com/jordanbrauer/unit-converter/pull/49) ([jordanbrauer](https://github.com/jordanbrauer))

**Closed issues:**

- Need a Contributing Guide [\#27](https://github.com/jordanbrauer/unit-converter/issues/27)
- Basic units of measurement for Energy \(Power\) [\#11](https://github.com/jordanbrauer/unit-converter/issues/11)
- Basic units of measurement for Pressure [\#9](https://github.com/jordanbrauer/unit-converter/issues/9)
- Basic units of measurement for Weight \(Mass\) [\#5](https://github.com/jordanbrauer/unit-converter/issues/5)

**Merged pull requests:**

- Documentation Fixes & Improvements [\#51](https://github.com/jordanbrauer/unit-converter/pull/51) ([jordanbrauer](https://github.com/jordanbrauer))
- Fix: api docs [\#50](https://github.com/jordanbrauer/unit-converter/pull/50) ([jordanbrauer](https://github.com/jordanbrauer))

## [v0.4.0](https://github.com/jordanbrauer/unit-converter/tree/v0.4.0) (2017-11-12)
[Full Changelog](https://github.com/jordanbrauer/unit-converter/compare/v0.3.9-beta...v0.4.0)

**Implemented enhancements:**

- Add new unit property, "scientificSymbol" for special unicode character symbols [\#46](https://github.com/jordanbrauer/unit-converter/issues/46)
- Hacktoberfest Development [\#48](https://github.com/jordanbrauer/unit-converter/pull/48) ([jordanbrauer](https://github.com/jordanbrauer))
- Scientific Symbol Added [\#47](https://github.com/jordanbrauer/unit-converter/pull/47) ([luchianenco](https://github.com/luchianenco))
- Added last weight measures [\#37](https://github.com/jordanbrauer/unit-converter/pull/37) ([teunw](https://github.com/teunw))
- Added time measurements [\#35](https://github.com/jordanbrauer/unit-converter/pull/35) ([teunw](https://github.com/teunw))
- Added millibar as pressure unit [\#34](https://github.com/jordanbrauer/unit-converter/pull/34) ([teunw](https://github.com/teunw))
- Adding energy units [\#33](https://github.com/jordanbrauer/unit-converter/pull/33) ([andrewboerema](https://github.com/andrewboerema))
- Implement Kilopascal and Megapascal and write tests [\#29](https://github.com/jordanbrauer/unit-converter/pull/29) ([arubacao](https://github.com/arubacao))

**Fixed bugs:**

- Fix: add missing self conversions for temperature units [\#31](https://github.com/jordanbrauer/unit-converter/pull/31) ([jordanbrauer](https://github.com/jordanbrauer))
- remove composer.lock from repo and add it to .gitignore [\#30](https://github.com/jordanbrauer/unit-converter/pull/30) ([arubacao](https://github.com/arubacao))

**Closed issues:**

- Basic units of measurement for Time [\#10](https://github.com/jordanbrauer/unit-converter/issues/10)
- Basic units of measurement for Temperature [\#8](https://github.com/jordanbrauer/unit-converter/issues/8)
- Basic units of measurement for Speed [\#6](https://github.com/jordanbrauer/unit-converter/issues/6)
- Basic units of measurement for Volume [\#4](https://github.com/jordanbrauer/unit-converter/issues/4)

**Merged pull requests:**

- Add first set of dev docs [\#44](https://github.com/jordanbrauer/unit-converter/pull/44) ([jordanbrauer](https://github.com/jordanbrauer))
- Feat: add simple contributing guide for now \(\#27\) [\#36](https://github.com/jordanbrauer/unit-converter/pull/36) ([jordanbrauer](https://github.com/jordanbrauer))
- Feature/improve travis file [\#32](https://github.com/jordanbrauer/unit-converter/pull/32) ([arubacao](https://github.com/arubacao))

## [v0.3.9-beta](https://github.com/jordanbrauer/unit-converter/tree/v0.3.9-beta) (2017-10-11)
**Implemented enhancements:**

- Feat: add basic energy units [\#25](https://github.com/jordanbrauer/unit-converter/pull/25) ([jordanbrauer](https://github.com/jordanbrauer))
- Units pressure [\#22](https://github.com/jordanbrauer/unit-converter/pull/22) ([jordanbrauer](https://github.com/jordanbrauer))
- Units volume [\#21](https://github.com/jordanbrauer/unit-converter/pull/21) ([jordanbrauer](https://github.com/jordanbrauer))
- Add support for units of temperature [\#18](https://github.com/jordanbrauer/unit-converter/pull/18) ([jordanbrauer](https://github.com/jordanbrauer))
- Add support for units of speed [\#17](https://github.com/jordanbrauer/unit-converter/pull/17) ([jordanbrauer](https://github.com/jordanbrauer))
- Support for Plane Angle units [\#16](https://github.com/jordanbrauer/unit-converter/pull/16) ([jordanbrauer](https://github.com/jordanbrauer))
- Added package specific exception classes to handle uncaught exceptions [\#15](https://github.com/jordanbrauer/unit-converter/pull/15) ([jordanbrauer](https://github.com/jordanbrauer))
- Add support for Area units of measure [\#13](https://github.com/jordanbrauer/unit-converter/pull/13) ([jordanbrauer](https://github.com/jordanbrauer))

**Fixed bugs:**

- Fix calc method [\#20](https://github.com/jordanbrauer/unit-converter/pull/20) ([jordanbrauer](https://github.com/jordanbrauer))
- Fix: all units now use configure\(\) method to configure data [\#19](https://github.com/jordanbrauer/unit-converter/pull/19) ([jordanbrauer](https://github.com/jordanbrauer))
- Fix: accidently had all classes be abstract [\#14](https://github.com/jordanbrauer/unit-converter/pull/14) ([jordanbrauer](https://github.com/jordanbrauer))

**Closed issues:**

- Basics units of measurement for Rotation [\#7](https://github.com/jordanbrauer/unit-converter/issues/7)
- Basic units of measurement for Area [\#3](https://github.com/jordanbrauer/unit-converter/issues/3)
- Custom ErrorException classes would be nice [\#2](https://github.com/jordanbrauer/unit-converter/issues/2)

**Merged pull requests:**

- Base working package [\#26](https://github.com/jordanbrauer/unit-converter/pull/26) ([jordanbrauer](https://github.com/jordanbrauer))
- Revert "Units energy" [\#24](https://github.com/jordanbrauer/unit-converter/pull/24) ([jordanbrauer](https://github.com/jordanbrauer))
- Units energy [\#23](https://github.com/jordanbrauer/unit-converter/pull/23) ([jordanbrauer](https://github.com/jordanbrauer))
- MVP version of component [\#1](https://github.com/jordanbrauer/unit-converter/pull/1) ([jordanbrauer](https://github.com/jordanbrauer))



\* *This Change Log was automatically generated by [github_changelog_generator](https://github.com/skywinder/Github-Changelog-Generator)*
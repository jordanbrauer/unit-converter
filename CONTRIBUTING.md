# Contribution Guide

So, you want to contribute to this project. Perhaps you've found a bug? Perhaps there is a feature or two that you feel is missing and would like to see implemented in the next release? Why wait until someone else can get around to fixing it when you can do it yourself!

> Please read our **[Code of Conduct](https://github.com/jordanbrauer/unit-converter/blob/master/CODE_OF_CONDUCT.md)** if you are unsure on how to conduct yourself when submitting issues and pull requests.

## Quick Start

If you're an experienced developer, you can start contributing right away by following this high level overview of steps. We still recommend and ask that you read the full document 😉.

1. Fork the latest version of this repository.
1. Clone your fork to your local machine.
1. Install the project's developer dependencies:

    ```bash
    $ composer install
    $ npm install # yarn works too
    ```

1. Checkout a new branch for your feature!
1. Begin hacking!
1. Make a pull request **into** `jordanbrauer:master` **from** `you:your-branch`

## How to Contribute

If you are not an experienced developer, or would like to read the full set of instructions and guidelines for contributing, this section is for you.

### Style Guide

> **Note:** If you install the Composer & npm developer dependencies, your code style changes will be handled by PHP CS Fixer, thanks to an automatic pre-commit hook that is set up after npm installs.

* Files **MUST** use only `<?php` tags.
* Files **MUST** use only `utf-8` encoding without BOM.
* Files **MUST** use LF (Unix) line endings.
* Files **MUST** end with an empty line.
* Files SHOULD either declare symbols (classes, functions, constants, etc.) _or_ cause side-effects (e.g. generate output, change .ini settings, etc.) but SHOULD NOT do both.
* Namespaces and classes **MUST** follow the "autoloading" PSR standard, [PSR-4]().
* Class names **MUST** be declared in `StudlyCaps`.
* Class constants **MUST** be declared in all upper case with underscore separators.
* Class method and property names **MUST** be declared in `camelCase`.

### Writing Tests

In an effort to keep an easily maintainable code base for everyone, I ask that any contributions you end up making include the appropriate tests that affirm the integrity of your code.

### Submitting a Pull Request

When it comes time for submission, make sure that you target the `master` branch of this repository.

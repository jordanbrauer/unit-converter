<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Measure;

abstract class TestCase extends PHPUnitTestCase
{
    /**
     * @var ConverterBuilder
     */
    protected $builder;

    protected function setUp()
    {
        $this->builder = UnitConverter::createBuilder();
    }

    protected function tearDown()
    {
        unset($this->builder);
    }

    protected function simpleConverter(): UnitConverterInterface
    {
        return $this->builder->addSimpleCalculator()
            ->addDefaultRegistry();
    }

    protected function binaryConverter(): UnitConverterInterface
    {
        return $this->builder->addBinaryCalculator()
            ->addDefaultRegistry();
    }

    protected function simpleVolumeConverter(): UnitConverterInterface
    {
        return $this->builder->addSimpleCalculator()
            ->addRegistryFor(Measure::VOLUME);
    }
}

<?php

require_once 'PHPUnit/Framework/TestListener.php';

/**
 * Better UI for PHPUnit Test Progression
 *
 * @see https://github.com/stjohnjohnson/prettylistener-phpunit
 */
class PrettyListener implements PHPUnit_Framework_TestListener
{
    public $depth = 0;

    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        //
    }

    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        //
    }

    public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        //
    }

    public function addSkippedTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        //
    }

    public function startTest(PHPUnit_Framework_Test $test)
    {
        echo PHP_EOL, str_repeat('  ', $this->depth), $test->getName(), ' ';
        $this->depth++;
    }

    public function endTest(PHPUnit_Framework_Test $test, $time)
    {
        $this->depth--;
    }

    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        $name = $suite->getName();

        // This will match classes that end with Test (required for phpunit)
        if (strpos($name, '::') === false
            && strpos($name, ' ') === false
            && strpos($name, 'Test') === strlen($name) - 4
        ) {
            $name = substr($name, 0, -4);
        }

        // Remove classes from method calls (during dataProviders)
        $name = trim(substr($name, strpos($name, '::')), ':');

        echo PHP_EOL;

        // Dealing with a Test Suite
        if ($this->depth < 3) {
            echo PHP_EOL;
        }

        // Space it out according to the depth
        echo str_repeat('  ', $this->depth), $name;

        // Bump up the depth
        $this->depth++;
    }

    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        $this->depth--;
    }
}

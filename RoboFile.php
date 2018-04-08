<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */

use Robo\Tasks;

class RoboFile extends Tasks
{
    const DOCUMENTATION_BIN = 'bin/phpdoc.phar';

    const DOCUMENTATION_ROOT = 'docs';

    /**
     * Generate a new copy of the changelog.
     *
     * @link https://github.com/skywinder/github-changelog-generator
     *
     * @return void
     */
    public function generateChangelog ()
    {
        $this->_exec('github_changelog_generator');
    }
    /**
     * Returns the root path for the documentation to be generated in.
     *
     * @param null|string (optional) A custom path to generate the docs to.
     * @return string
     */
    private function documentationRoot (string $destination = null): string
    {
        $root = self::DOCUMENTATION_ROOT;

        return ($destination)
            ? rtrim($destination, '/').'/'.$root
            : "{$this->rootPath()}/{$root}";
    }

    /**
     * Returns the current root path of the repository.
     *
     * @return string
     */
    private function rootPath (): string
{
        return rtrim(realpath(__DIR__), '/');
    }
}

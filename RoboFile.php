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
     * Generate a fresh set of documentation.
     *
     * @param null|string $source The source to generate the documentation from.
     * @param null|string $destination The destination to output the generated files.
     * @return void
     */
    public function generateDocs (string $source = null, string $destination = null): void
    {
        $destination = $this->documentationRoot($destination);

        if (file_exists($destination) and is_dir($destination)) {
            $this->say('<fg=red>Removing stale documentation .. </>');
            $this->taskDeleteDir($destination)->run();
            $this->say('<info>OK</info>');
        } else {
            $this->say('<comment>No stale documentation to remove</comment>');
        }

        $root = $this->rootPath();
        $bin = self::DOCUMENTATION_BIN;
        $generator = "{$root}/{$bin}";

        if (file_exists($generator)) {
            $source = $source ?? "{$root}/src/";
            $this->taskExec($generator)
                ->arg('run')
                ->option('directory', $source)
                ->option('target', $destination)
                ->run();
        } else {
            $this->io()->error("phpdoc.phar could not be found in {$generator}");
            exit;
        }
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

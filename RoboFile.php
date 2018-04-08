<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */

use Robo\Tasks;

class RoboFile extends Tasks
{
    const CHANGELOG_FILE = 'CHANGELOG.md';

    const CHANGELOG_COMMIT_MESSAGE = 'Update changelog for v';

    const DOCUMENTATION_BIN = 'bin/phpdoc.phar';

    const DOCUMENTATION_ROOT = 'docs';

    const DOCUMENATION_COMMIT_MESSAGE = 'Update documentation for v';

    /**
     * Release the next stable version of the package.
     *
     * @param string $version A valid semver version scheme string to set as the next version and tag.
     * @param bool $commit Should the changes be commited and tagged?
     * @return void
     */
    public function releaseStable (string $version, bool $commit = true): void
    {

        $this->upgradeDocumentation($version, $commit);
        $this->upgradeChangelog($version, $commit);
        $this->say("Successfully bumped version to <fg=blue>v</><fg=cyan>{$version}</>");
    }

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
     * Commit an upgrade to the documentation for the project.
     *
     * @param string $version
     * @param boolean $commit
     * @return void
     */
    private function upgradeDocumentation (string $version, bool $commit = true): void
    {
        $documentation = self::DOCUMENTATION_ROOT;
        $message = self::DOCUMENATION_COMMIT_MESSAGE;
        $this->upgradeAsset('generateDocs', $documentation, $message, $commit);
    }

     /**
     * Commit an upgrade to the changelog for the project.
     *
     * @param string $version
     * @param boolean $commit
     * @return void
     */
    private function upgradeChangelog (string $version, bool $commit = true): void
    {
        $changelog = self::CHANGELOG_FILE;
        $message = self::CHANGELOG_COMMIT_MESSAGE . $version;
        $this->upgradeAsset('generateChangelog', $changelog, $message, $commit);
    }

    /**
     * Upgrade an asset for the next version of the project.
     *
     * @param string $method The name of the method to be used for upgrading.
     * @param string $files The files to add from the method changes
     * @param string $commitMessage The message to commit the changes with.
     * @param boolean $commitChanges (optional) If set to false, a commit will not be executed. Useful for dry runs.
     * @return void
     */
    private function upgradeAsset (string $method, string $files, string $commitMessage, bool $commitChanges = true): void
    {
        if (method_exists($this, $method)) {
            $this->{$method}();

            if ($commitChanges) {
                $this->taskGitStack()
                    ->stopOnFail()
                    ->add("{$this->rootPath()}/{$files}")
                    ->commit("{$commitMessage}")
                    ->run();
            }
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

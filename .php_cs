<?php

$root = realpath(__DIR__ . '/..');
$finder = PhpCsFixer\Finder::create()
    ->exclude([
      '.git',
      '.github',
      '.vscode',
      'bin',
      'dev',
      'docs',
      'vendor',
      'node_modules',
      'bower_components',
    ])
    ->notPath("{$root}/*.md")
    ->notPath("{$root}/*.txt")
    ->notPath("{$root}/*.json")
    ->notPath("{$root}/*.yml")
    ->notPath("{$root}/*.yaml")
    ->notPath("{$root}/*.xml")
    ->notPath("{$root}/composer.*")
    ->notPath("{$root}/.php_cs*")
    ->notPath("{$root}/.env*")
    ->notPath("{$root}/.editorconfig")
    ->notPath("{$root}/.github_changelog_generator")
    ->notPath("{$root}/.gitignore")
    ->notPath("{$root}/LICENSE")
    ->notPath("{$root}/TODO")
    ->in($root);

return PhpCsFixer\Config::create()
    ->setFinder($finder)
    ->setIndent('    ') # 4 spaces
    ->setLineEnding("\n")
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setRules([
        '@PSR2' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
    ]);

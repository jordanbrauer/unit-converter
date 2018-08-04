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
    ->in($root);

foreach ([
    '*.md',
    '*.txt',
    '*.json',
    '*.yml',
    '*.yaml',
    '*.xml',
    'composer.*',
    '.php_cs*',
    '.env*',
    '.editorconfig',
    '.github_changelog_generator',
    '.gitignore',
    'LICENSE',
    'TODO',
] as $pattern) $finder->notPath("{$root}/{$pattern}");

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

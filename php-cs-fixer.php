<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in('.')
    ->exclude(
        [
            'bin',
            'var',
            'vendor',
        ]
    );

$fixer = Config::create()
    ->setRules(
        [
            '@PSR1' => true,
            '@PSR2' => true,
            '@Symfony' => true,
            'array_syntax' => ['syntax' => 'short'],
            'compact_nullable_typehint' => true,
            'concat_space' => ['spacing' => 'one'],
            'fully_qualified_strict_types' => true,
            'general_phpdoc_annotation_remove' => ['author', 'package', 'subpackage'],
            'method_chaining_indentation' => true,
            'no_superfluous_elseif' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'ordered_class_elements' => true,
            'ordered_imports' => true,
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_align' => ['align' => 'left'],
            'phpdoc_order' => true,
            'phpdoc_var_without_name' => false,
        ]
    )
    ->setRiskyAllowed(false)
    ->setUsingCache(true)
    ->setCacheFile('build/.php_cs.cache')
    ->setFinder($finder);

return $fixer;

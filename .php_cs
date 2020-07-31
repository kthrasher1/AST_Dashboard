<?php
​
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__);
​
$rules = [
    '@PSR2' => true,
    'concat_space' => ['spacing' => 'one'],
    'ordered_imports' => ['sort_algorithm' => 'length'],
    'no_unused_imports' => true,
    'method_argument_space' => false,
    'no_superfluous_phpdoc_tags' => true,
];
​
return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);

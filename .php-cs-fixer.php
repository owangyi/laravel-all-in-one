<?php

$finder = (new PhpCsFixer\Finder())
    ->exclude('tmp')
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PhpCsFixer' => true,
    ])
    ->setFinder($finder)
    ;

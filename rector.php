<?php

use Rector\Config\RectorConfig;
use Rector\PHPUnit\AnnotationsToAttributes\Rector\Class_\CoversAnnotationWithValueToAttributeRector;

return RectorConfig::configure()
    ->withRules([
        CoversAnnotationWithValueToAttributeRector::class,
    ])
    ->withImportNames(
        removeUnusedImports: true,
        importDocBlockNames: true,
    );

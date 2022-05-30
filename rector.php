<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src'
    ]);

    $rectorConfig->skip([
        __DIR__ . '/vendor',
    ]);

    $dir   = new \RecursiveDirectoryIterator( __DIR__ . '/vendor/rector/rector/stubs-rector', \RecursiveDirectoryIterator::SKIP_DOTS);

    $stubs = array_map(
        function (\SplFileInfo $splFileInfo): string {
            return $splFileInfo->getRealPath();
        },
        iterator_to_array(new \RecursiveIteratorIterator($dir))
    );

    $rectorConfig->bootstrapFiles($stubs);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    // define sets of rules
    //    $rectorConfig->sets([
    //        LevelSetList::UP_TO_PHP_72
    //    ]);
};

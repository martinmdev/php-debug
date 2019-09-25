<?php

require __DIR__ . '/../../vendor/autoload.php';

use Martinm\Debug\DebugHelper;

DebugHelper::create()->pp([
    'x' => 'I am x',
    'y' => 'y123',
]);

<?php

require __DIR__ . '/../../vendor/autoload.php';

use Martinm\Debug\DebugHelper;

DebugHelper::create()->ppv([
    'x' => 'I am x',
    'y' => 'y123',
]);


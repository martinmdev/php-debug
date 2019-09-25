<?php

require __DIR__ . '/../../vendor/autoload.php';

use Martinm\Debug\DebugHelper;

DebugHelper::create()->render(__DIR__ . '/../render-template.php', [
    'x' => 'I am x',
    'y' => 'y123',
]);

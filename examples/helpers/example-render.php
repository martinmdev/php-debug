<?php

require __DIR__ . '/../../vendor/autoload.php';

render(__DIR__ . '/../render-template.php', [
    'x' => 'I am x',
    'y' => 'y123',
]);

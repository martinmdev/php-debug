<?php

require __DIR__ . '/../../vendor/autoload.php';

use Martinm\Debug\DebugHelper;

DebugHelper::create()->a('http://example.com/foo/bar');

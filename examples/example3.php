<?php

use Martinm\Debug\FooDumper;

require __DIR__ . '/../vendor/autoload.php';

$a = ['x'=>1];

$fooDumper = new FooDumper();
$fooDumper->dump($a);
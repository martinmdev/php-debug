<?php

$dataFile = __DIR__ . '/../tests/Debug/serialized.txt';

$examples = [
    0 => 'DebugHelper/example-a.php',
    1 => 'DebugHelper/example-dm.php',
    2 => 'DebugHelper/example-xdebugReset.php',
    3 => 'DebugHelper/example-eed.php',
    4 => 'DebugHelper/example-render.php',
    5 => 'DebugHelper/example-ddc.php',
    6 => 'DebugHelper/example-vd.php',
    7 => 'DebugHelper/example-a.php',
    8 => 'DebugHelper/example-dd.php',
    9 => 'DebugHelper/example-ppd.php',
    10 => 'DebugHelper/example-ee.php',
    11 => 'DebugHelper/example-ppv.php',
    12 => 'DebugHelper/example-dc.php',
    13 => 'DebugHelper/example-pp.php',
    14 => 'helpers/example-dm.php',
    15 => 'helpers/example-xdebugReset.php',
    16 => 'helpers/example-eed.php',
    17 => 'helpers/example-render.php',
    18 => 'helpers/example-ddc.php',
    19 => 'helpers/example-vd.php',
    20 => 'helpers/example-a.php',
    21 => 'helpers/example-dd.php',
    22 => 'helpers/example-ppd.php',
    23 => 'helpers/example-ee.php',
    24 => 'helpers/example-ppv.php',
    25 => 'helpers/example-dc.php',
    26 => 'helpers/example-pp.php',
];

$a = [];
foreach ($examples as $example) {

    $path = __DIR__ . '/' . $example;

    $cmd = 'php ' . $path;
    $cmd .= ' 2>&1 ';

    $res = shell_exec($cmd);

    $t2 = [
        $example,
        $res,
    ];

    $a[] = $t2;
}

$as = serialize($a);

file_put_contents($dataFile, $as);

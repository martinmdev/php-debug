<?php

namespace Martinm\Test\Debug;

use PHPUnit\Framework\TestCase;

class DebugTest extends TestCase
{
    /**
     * @dataProvider provide
     */
    public function test1($example, $expectedOutput)
    {
        $path = __DIR__ . '/../../examples/' . $example;

        $cmd = 'php ' . $path;
        $cmd .= ' 2>&1 ';

        $res = shell_exec($cmd);

        $this->assertEquals($expectedOutput, $res);
    }

    public function provide()
    {
        $dataFile = __DIR__ . '/serialized.txt';

        $serialized = file_get_contents($dataFile);
        $data = unserialize($serialized);

        return $data;
    }
}

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
        $root = realpath(__DIR__ . '/../../');

        $path = __DIR__ . '/../../examples/' . $example;

        $cmd = 'php ' . $path;
        $cmd .= ' 2>&1 ';

        $res = shell_exec($cmd);

        $res = str_replace($root, '', $res);
        $expectedOutput = str_replace($root, '', $expectedOutput);

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

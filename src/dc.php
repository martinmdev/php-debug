<?php

class DebugHelper
{
    public static $enableDc = true;
    // public static $enableDc = false;
    public static $debugStyles = [];
    public static $numberOfColors = 10;

    public static function init()
    {
        $colors = [];
        $color = new \Primal\Color\Wheel();
        $color->setTotalColors(6);

//        $color->setStartColor("ff0000");
//        $color->setStartColor("FF8B8B");
//        $color->setStartColor("783D3D");
//        $colors = array_merge($colors, $color->setStartColor("763D3D")->getArray());
        $colors = array_merge($colors, $color->setStartColor("FFFFDC")->getArray());
        $colors = array_merge($colors, $color->setStartColor("DA7272")->getArray());

//        $colors = [
//            "#763D3D",
//            "#8f8f46",
//            "#468F51",
//            "#468F89",
//            "#46488F",
//            "#88468F",
//        ];

        $maxColorInt = 16777215;
        $step = (int)($maxColorInt / self::$numberOfColors);

//        for($i = 0; $i <= $maxColorInt; $i += $step) {
        foreach ($colors as $c) {
//            $bgColor = sprintf('%06s', dechex($i));
            $bgColor = $c;
//            $color = "ffffff";
            $color = "000000";
            self::$debugStyles[] = "background-color: " . $bgColor . "; color: #" . $color . ";";
        }
//        ppv(self::$debugStyles);
    }
}

DebugHelper::init();

function dc($x = null)
{
    if (!DebugHelper::$enableDc) {
        return;
    }
    static $dumpedLines = [];
    static $dumpedMethods = [];

    $trace = debug_backtrace();
    $fileLine = $trace[0]['file'] . ":" . $trace[0]['line'];
    $printFileLines = $fileLine;
    $method = "n/a";
    if (isset($trace[1]['function'])) {
        $method = $trace[1]['function'];
        if (isset($trace[1]['class'])) {
            $method = $trace[1]['class'] . "::" . $method;
        }

        $printFileLines = "$printFileLines <strong>(" . $method . ")</strong>";
    }
    $dumpedLines[$fileLine] = true;
    $dumpedMethods[$method] = true;
    $positionInDumpedLines = array_search($fileLine, array_keys($dumpedLines));
    $positionInDumpedMethods = array_search($method, array_keys($dumpedMethods));
//    ppv($position);
//    $positionInDumpedLines++;
    $positionInDumpedMethods++;
//    $styleIndex = (count(DebugStyles::$debugStyles) - 1 ) % $positionInDumpedLines;
//    $styleIndex = (count(DebugHelper::$debugStyles) - 1 ) % $positionInDumpedMethods;
    $styleIndex = $positionInDumpedMethods % count(DebugHelper::$debugStyles);
//    ppv($styleIndex);

    $printFileLines = "<strong style='position: relative; left: -15px;'>" . $positionInDumpedLines . "</strong>" . $printFileLines;

    $s = "";
    $s .= "<div style='padding: 1px; padding-left: 20px;" . DebugHelper::$debugStyles[$styleIndex] . "'>";
    $s .= pp($printFileLines, true);
    $s .= func_num_args() ? ppv($x, true) : '';
    $s .= "</div>";

    echo $s;
}

function ddc($x = null)
{
    dc($x);
    die();
}

<?php

ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);
ini_set("xdebug.overload_var_dump", 1);

/**
 * Dump and Die
 * ppv (print_pre print_r var_dump) the variable and die
 *
 * @param $x
 */
function dd()
{
    if (func_num_args()) {
        ppv(func_get_args());
    }

    die();
}

function pp($v, $return = false)
{
    $s = "";
    if (php_sapi_name() !== 'cli') {
        $s .= "<pre style='margin: 0px;'>";
    }
    $s .= print_r($v, true);
    if (php_sapi_name() !== 'cli') {
        $s .= "</pre>";
    }

    return $return ? $s : (print $s);
}

function ppv($v, $return = false)
{
    ob_start();
    var_dump($v);

    return pp(ob_get_clean(), $return);
}

function ppd($return = false)
{
    $s = ppv((new \Exception())->getTraceAsString(), $return);

    return $return ? $s : (print $s);
}

function vd()
{
    var_dump(...func_get_args());
}

function a($url)
{
    echo '<a href="' . $url . '" target="_blank">' . $url . '</a><br />';
}

function dm()
{
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

    dd($printFileLines);
}

function ee()
{
    $trace = debug_backtrace();
    $fileLine = $trace[0]['file'] . ":" . $trace[0]['line'];
    $printFileLines = $fileLine;
    $method = "n/a";
    if (isset($trace[1]['function'])) {
        $method = $trace[1]['function'];
        if (isset($trace[1]['class'])) {
            $method = $trace[1]['class'] . "::" . $method;
        }

        $printFileLines = "$printFileLines (" . $method . ")";
    }

    $log = $printFileLines;

    $args = func_get_args();
    if (isset($args[0])) {
        $log .= ":" . var_export($args[0], true);
    }

    error_log($log);
}

function eed()
{
    $s = (new \Exception())->getTraceAsString();
    ee($s);
}

function render($file, $data)
{
    ob_start();
    extract($data);
    require $file;
    return ob_get_clean();
}
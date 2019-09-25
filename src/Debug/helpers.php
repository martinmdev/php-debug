<?php

use Martinm\Debug\DebugHelper;

if (!function_exists('xdebugReset')) {
    function xdebugReset()
    {
        DebugHelper::create()->xdebugReset();
    }
}

if (!function_exists('dd')) {

    function dd()
    {
        DebugHelper::create()->dd(...func_get_args());
    }
}

if (!function_exists('pp')) {

    function pp($v, $return = false)
    {
        return DebugHelper::create()->pp($v, $return);
    }
}

if (!function_exists('ppv')) {

    function ppv($v, $return = false)
    {
        return DebugHelper::create()->ppv($v, $return);
    }
}

if (!function_exists('ppd')) {

    function ppd($return = false)
    {
        return DebugHelper::create()->ppd($return);
    }
}

if (!function_exists('vd')) {

    function vd()
    {
        DebugHelper::create()->vd(...func_get_args());
    }
}

if (!function_exists('a')) {

    function a($url)
    {
        DebugHelper::create()->a($url);
    }
}

if (!function_exists('dm')) {

    function dm()
    {
        DebugHelper::create()->dm();
    }
}

if (!function_exists('ee')) {

    function ee()
    {
        DebugHelper::create()->ee();
    }
}

if (!function_exists('eed')) {

    function eed()
    {
        DebugHelper::create()->eed();
    }
}

if (!function_exists('render')) {

    function render($file, $data)
    {
        return DebugHelper::create()->render($file, $data);
    }
}

if (!function_exists('dc')) {

    function dc($x = null)
    {
        DebugHelper::create()->dc(...func_get_args());
    }
}

if (!function_exists('ddc')) {

    function ddc($x = null)
    {
        DebugHelper::create()->ddc($x);
    }
}

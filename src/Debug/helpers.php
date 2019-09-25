<?php

use Martinm\Debug\DebugHelper;

if (!function_exists('xdebugReset')) {
    /**
     *
     */
    function xdebugReset()
    {
        DebugHelper::create()->xdebugReset();
    }
}

if (!function_exists('dd')) {
    /**
     *
     */
    function dd()
    {
        DebugHelper::create()->dd(...func_get_args());
    }
}

if (!function_exists('pp')) {
    /**
     * @param      $v
     * @param bool $return
     *
     * @return int|string
     */
    function pp($v, $return = false)
    {
        return DebugHelper::create()->pp($v, $return);
    }
}

if (!function_exists('ppv')) {
    /**
     * @param      $v
     * @param bool $return
     *
     * @return int|string
     */
    function ppv($v, $return = false)
    {
        return DebugHelper::create()->ppv($v, $return);
    }
}

if (!function_exists('ppd')) {
    /**
     * @param bool $return
     *
     * @return int|string
     */
    function ppd($return = false)
    {
        return DebugHelper::create()->ppd($return);
    }
}

if (!function_exists('vd')) {
    /**
     *
     */
    function vd()
    {
        DebugHelper::create()->vd(...func_get_args());
    }
}

if (!function_exists('a')) {
    /**
     * @param $url
     */
    function a($url)
    {
        DebugHelper::create()->a($url);
    }
}

if (!function_exists('dm')) {
    /**
     *
     */
    function dm()
    {
        DebugHelper::create()->dm();
    }
}

if (!function_exists('ee')) {
    /**
     *
     */
    function ee()
    {
        DebugHelper::create()->ee();
    }
}

if (!function_exists('eed')) {
    /**
     *
     */
    function eed()
    {
        DebugHelper::create()->eed();
    }
}

if (!function_exists('render')) {
    /**
     * @param $file
     * @param $data
     *
     * @return false|string
     */
    function render($file, $data)
    {
        return DebugHelper::create()->render($file, $data);
    }
}

if (!function_exists('dc')) {
    /**
     * @param null $x
     */
    function dc($x = null)
    {
        DebugHelper::create()->dc(...func_get_args());
    }
}

if (!function_exists('ddc')) {
    /**
     * @param null $x
     */
    function ddc($x = null)
    {
        DebugHelper::create()->ddc($x);
    }
}

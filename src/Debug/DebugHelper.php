<?php

namespace Martinm\Debug;

class DebugHelper
{
    public static function create()
    {
        return new static();
    }

    public function xdebugReset()
    {
        ini_set("xdebug.var_display_max_children", -1);
        ini_set("xdebug.var_display_max_data", -1);
        ini_set("xdebug.var_display_max_depth", -1);
        ini_set("xdebug.overload_var_dump", 1);
    }

    /**
     * Dump and Die
     * ppv (print_pre print_r var_dump) the variable and die
     *
     * @param $x
     */
    public function dd()
    {
        if (func_num_args()) {
            $this->ppv(func_get_args());
        }

        die();
    }

    public function pp($v, $return = false)
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

    public function ppv($v, $return = false)
    {
        ob_start();
        var_dump($v);

        return $this->pp(ob_get_clean(), $return);
    }

    public function ppd($return = false)
    {
        $s = $this->ppv((new \Exception())->getTraceAsString(), $return);

        return $return ? $s : (print $s);
    }

    public function vd()
    {
        var_dump(...func_get_args());
    }

    public function a($url)
    {
        echo '<a href="' . $url . '" target="_blank">' . $url . '</a><br />';
    }

    public function dm()
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

        $this->dd($printFileLines);
    }

    public function ee()
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

    public function eed()
    {
        $s = (new \Exception())->getTraceAsString();
        $this->ee($s);
    }

    public function render($file, $data)
    {
        ob_start();
        extract($data);
        require $file;

        return ob_get_clean();
    }

    public static $colors1 = [
        0 => '#ffffdb',
        1 => '#dcffdb',
        2 => '#dbfffe',
        3 => '#dbddff',
        4 => '#fddbff',
        5 => '#ffdbde',
        6 => '#da7272',
        7 => '#dad872',
        8 => '#75da72',
        9 => '#72dad4',
        10 => '#7279da',
        11 => '#d172da',
    ];

    public static $enableDc = true;
    public static $debugStyles = [];
    public static $debugCliStyles = [];
    public static $numberOfColors = 10;

    public static function init()
    {
        foreach (self::$colors1 as $c) {
            $bgColor = $c;
            $color = "000000";
            self::$debugStyles[] = "background-color: " . $bgColor . "; color: #" . $color . ";";
        }

        $saved = [
            7,

            // 3* are fg
            // 31,
            // 32,
            // 33,
            // 34,
            // 35,
            // 36,

            41,
            44,
            45,
            100,
            101,
            104,
        ];

        foreach ($saved as $int) {
            self::$debugCliStyles[] = [
                'bgColor' => $int,
            ];
        }
    }


    public function dc($x = null)
    {
        if (!DebugHelper::$enableDc) {
            return;
        }

        $maxCalls = 100;
        static $countCalls;
        if (!isset($countCalls)) {
            $countCalls = 0;
        }
        $countCalls++;
        if ($countCalls > $maxCalls) {
            $this->dd('Max calls reached');
        }

        static $dumpedLines = [];
        static $dumpedMethods = [];

        $isCli = \PHP_SAPI === 'cli';

        $trace = debug_backtrace();
        $fileLine = $trace[0]['file'] . ":" . $trace[0]['line'];
        $printFileLines = $fileLine;
        $method = "n/a";
        if (isset($trace[1]['function'])) {
            $method = $trace[1]['function'];
            if (isset($trace[1]['class'])) {
                $method = $trace[1]['class'] . "::" . $method;
            }
            if ($isCli) {
                $printFileLines = "$printFileLines (" . $method . ")";
            } else {
                $printFileLines = "$printFileLines <strong>(" . $method . ")</strong>";
            }
        }
        $dumpedLines[$fileLine] = true;
        $dumpedMethods[$method] = true;
        $positionInDumpedLines = array_search($fileLine, array_keys($dumpedLines));
        $positionInDumpedMethods = array_search($method, array_keys($dumpedMethods));

        $positionInDumpedMethods++;

        $styleIndex = $positionInDumpedMethods % count(DebugHelper::$debugStyles);
        $styleCliIndex = $positionInDumpedMethods % count(DebugHelper::$debugCliStyles);

        if ($isCli) {
            $printFileLines = "# " . $positionInDumpedLines . " " . $printFileLines;
        } else {
            $printFileLines = "<strong style='position: relative; left: -15px;'>" . $positionInDumpedLines . "</strong>" . $printFileLines;
        }

        $s = '';

        if (!$isCli) {
            $s .= "<div style='padding: 1px; padding-left: 20px;" . DebugHelper::$debugStyles[$styleIndex] . "'>";
        }

        $s .= $this->pp($printFileLines, true);

        $numArgs = func_num_args();
        if ($numArgs) {
            $s .= \PHP_EOL;
            if ($numArgs === 1) {
                $s .= $this->ppv($x, true);
            } else {
                $s .= $this->ppv(func_get_args(), true);
            }
        }

        if (!$isCli) {
            $s .= "</div>";
        }

        if ($isCli) {
            $bgCliColor = DebugHelper::$debugCliStyles[$styleCliIndex]['bgColor'];

            $s = "\e[" . $bgCliColor . "m" . $s . "\e[0m";
        }

        $s .= \PHP_EOL;

        echo $s;
    }

    public function ddc($x = null)
    {
        $this->dc($x);
        die();
    }
}

DebugHelper::init();

DebugHelper::create()->xdebugReset();

<?php

function parseArgs($argv)
{
    array_shift($argv);

    $out = array();

    foreach ($argv as $arg) {
        if (substr($arg, 0, 2) == '--') {
            $eqPos = strpos($arg, '=');

            if ($eqPos === false) {
                $key = substr($arg, 2);

                $out[$key] = isset($out[$key]) ? $out[$key] : true;
            } else {
                $key = substr($arg, 2, $eqPos - 2);

                $out[$key] = substr($arg, $eqPos + 1);
            }
        } elseif (substr($arg, 0, 1) == '-') {
            if (substr($arg, 2, 1) == '=') {
                $key = substr($arg, 1, 1);

                $out[$key] = substr($arg, 3);
            } else {
                $chars = str_split(substr($arg, 1));

                foreach ($chars as $char) {
                    $key = $char;

                    $out[$key] = isset($out[$key]) ? $out[$key] : true;
                }
            }
        } else {
            $out[] = $arg;
        }
    }

    return $out;
}

var_dump($argv);

echo php_sapi_name() . PHP_EOL;
echo PHP_SAPI . PHP_EOL;

var_dump(parseArgs($argv));
exit;

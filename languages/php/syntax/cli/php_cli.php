#!/usr/bin/env php
<?php

class Test
{
    public function updateUserStatus($userid): void
    {
        echo 'ok:' . json_encode($userid) . "\n";
    }
}


class PHPCli
{
    private $defaultAction = 'index';

    public function __construct()
    {
        if (!isset($_SERVER['argv'])) { // || strncasecmp(php_sapi_name(),'cli',3))
            die('This script must be run from the command line.');
        }

        if (isset($argv[0])) {
            $name = $argv[0];
            array_shift($argv);
        } else {
            $name = 'help';
        }
    }

    public function resolveRequest($args): array
    {
        $options = array();    // named parameters
        $params = array();    // unnamed parameters
        foreach ($args as $arg) {
            if (preg_match('/^--(\w+)(=(.*))?$/', $arg, $matches)) {
                $name = $matches[1];
                $value = isset($matches[3]) ? $matches[3] : true;
                if (isset($options[$name])) {
                    if (!is_array($options[$name])) {
                        $options[$name] = array($options[$name]);
                    }
                    $options[$name][] = $value;
                } else {
                    $options[$name] = $value;
                }
            } else {
                if (isset($action)) {
                    $params[] = $arg;
                } else {
                    $action = $arg;
                }
            }
        }
        if (!isset($action)) {
            $action = $this->defaultAction;
        }

        return array($action, $options, $params);
    }
}


$php_cli = new PHPCli();
$res = $php_cli->resolveRequest($argv);
call_user_func(array($res[0], $res[2][0]), $res[1]);
sleep(2);


function parseArgs($argv): array
{
    array_shift($argv);

    $out = array();
    foreach ($argv as $arg) {
        if (str_starts_with($arg, '--')) {
            $eqPos = strpos($arg, '=');

            if ($eqPos === false) {
                $key = substr($arg, 2);

                $out[$key] = $out[$key] ?? true;
            } else {
                $key = substr($arg, 2, $eqPos - 2);

                $out[$key] = substr($arg, $eqPos + 1);
            }
        } elseif (str_starts_with($arg, '-')) {
            if (substr($arg, 2, 1) == '=') {
                $key = substr($arg, 1, 1);

                $out[$key] = substr($arg, 3);
            } else {
                $chars = str_split(substr($arg, 1));

                foreach ($chars as $char) {
                    $key = $char;

                    $out[$key] = $out[$key] ?? true;
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

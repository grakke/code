<?php

use syntax\exception\Conf;
use syntax\exception\ConfException;
use syntax\exception\FileException;
use syntax\exception\XmlException;

include "Conf.php";

$fh = fopen(dirname(__FILE__) . "/log.txt", "a");
try {
    fputs($fh, "start\n");
    $conf = new Conf('./confd.xml');
    print "user: " . $conf->get('user') . "\n";
    print "host: " . $conf->get('host') . "\n";

    $conf->set("pass", "123456");
    print $conf->get("pass") . "\n";
    $conf->set("address", "NewYork");
    $conf->write();
    fputs($fh, "end\n");
    print $conf->get("address");
    fclose($fh);
} catch (FileException $e) {
    // permissions issue or non-existent file
    fputs($fh, "file exception\n");
    throw $e;
} catch (XmlException $e) {
    fputs($fh, "xml exception\n");
    // broken xml
} catch (ConfException $e) {
    fputs($fh, "conf exception\n");
    // wrong kind of XML file
} catch (\Error $e) {
    print get_class($e) . "\n";
    print $e->getMessage();
} catch (\Exception $e) {
    fputs($fh, "general exception\n");
    // backstop: should not be called
} finally {
    fputs($fh, "end\n");
    fclose($fh);
}

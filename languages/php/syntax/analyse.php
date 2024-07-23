<?php

echo "Initial Memory Usage:" . memory_get_usage() . " bytes " . PHP_EOL;

// let’s use up some memory
for ($i = 0; $i < 100000; $i++) {
    $array[] = md5($i);
}
// let’s remove half of the array
for ($i = 0; $i < 100000; $i++) {
    unset($array[$i]);
}

echo "Final   Memory Usage:" . memory_get_usage() . " bytes " . PHP_EOL;
echo "Peak    Memory Usage:" . memory_get_peak_usage() . " bytes " . PHP_EOL;
print_r(getrusage());

sleep(3);
$data = getrusage();
echo "User time: " . ($data['ru_utime.tv_sec'] + $data['ru_utime.tv_usec'] / 1000000) . PHP_EOL;
echo "System time: " . ($data['ru_stime.tv_sec'] + $data['ru_stime.tv_usec'] / 1000000);

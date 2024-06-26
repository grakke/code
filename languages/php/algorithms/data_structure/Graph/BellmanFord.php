<?php

function bellmanFord(array $graph, int $source): array
{
    $dist = [];
    $len = count($graph);

    foreach ($graph as $v => $adj) {
        $dist[$v] = PHP_INT_MAX;
    }

    $dist[$source] = 0;

    for ($k = 0; $k < $len - 1; $k++) {
        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len; $j++) {
                if ($dist[$i] > $dist[$j] + $graph[$j][$i]) {
                    $dist[$i] = $dist[$j] + $graph[$j][$i];
                }
            }
        }
    }

    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len; $j++) {
            if ($dist[$i] > $dist[$j] + $graph[$i][$j]) {
                echo 'The graph contains a negative-weight cycle!';
                return [];
            }
        }

        return $dist;
    }
}

const I = PHP_INT_MAX;
$graph = [
    0 => [I, 3, 5, 9, I, I], 1 => [3, I, 3, 4, 7, I], 2 => [5, 3, I, 2, 6, 3], 3 => [9, 4, 2, I, 2, 2],
    4 => [I, 7, 6, 2, I, 5], 5 => [I, I, 3, 2, 5, I]
];
$source = 0;
$distances = bellmanFord($graph, $source);
foreach ($distances as $target => $distance) {
    echo "distance from $source to $target is $distance \n";
}

<?php

$input = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\r\n", $input);

$leftList = [];
$rightList = [];

foreach ($lines as $line) {
    $linePart = explode("   ", $line);
    $leftList[] = intval($linePart[0]);
    $rightList[] = intval($linePart[1]);
}

sort($leftList);
sort($rightList);

$leftListCounts = array_count_values($leftList);
$rightListCounts = array_count_values($rightList);

$similarityScore = 0;
foreach ($leftListCounts as $number => $countInLeft) {
    if (isset($rightListCounts[$number])) {
        $similarityScore += $number * $countInLeft * $rightListCounts[$number];
    }
}

print($similarityScore);

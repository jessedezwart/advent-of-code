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

$difference = 0;
for ($i=0; $i < count($leftList); $i++) {
    $difference += abs($leftList[$i] - $rightList[$i]);
}

print($difference);

<?php

# Load the data into two lists
$input = file_get_contents("day1.txt");
$lines = explode("\r\n", $input);

$leftList = [];
$rightList = [];

foreach ($lines as $line) {
    $linePart = explode("   ", $line);
    $leftList[] = intval($linePart[0]);
    $rightList[] = intval($linePart[1]);
}

# Step 1
sort($leftList);
sort($rightList);

$difference = 0;
for ($i=0; $i < count($leftList); $i++) {
    $difference += abs($leftList[$i] - $rightList[$i]);
}

print($difference . PHP_EOL);

# Step 2
$leftListCounts = array_count_values($leftList);
$rightListCounts = array_count_values($rightList);

$similarityScore = 0;
foreach ($leftListCounts as $number => $countInLeft) {
    if (isset($rightListCounts[$number])) {
        $similarityScore += $number * $countInLeft * $rightListCounts[$number];
    }
}

print($similarityScore);

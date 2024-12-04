<?php

$input = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\r\n", $input);

foreach ($lines as &$line) {
    $line = array_map('intval', explode(' ', $line));
}

$i = 0;
foreach ($lines as $numbers) {
    if (isLineSafe($numbers)) $i++;
}
print($i);

function isLineSafe($numbers) {
    $numberCount = count($numbers);

    $increasing = $numbers[1] > $numbers[0];
    for ($i=0; $i < $numberCount-1; $i++) {
        $diff = ($numbers[$i]-$numbers[$i+1]);
        if (($increasing && $diff > 0) || (!$increasing && $diff < 0)) return false;
        $absDiff = abs($diff);
        if ($absDiff === 0 || $absDiff > 3) {
            return false;
        }
    }

    return true;
}

<?php

require_once "Misc.php";

$filename = 'input.txt';
if (!file_exists($filename)) {
    echo "Input file not found!" . PHP_EOL;
    exit;
}
$file = fopen($filename, 'r');

$sum = 0;

while ($line = fgets($file)) {
    $sameItems = array_intersect(
        str_split(substr($line, 0, strlen($line) / 2)),
        str_split(substr($line, strlen($line) / 2))
    );
    foreach (array_unique($sameItems) as $item) {
        $sum += getLetterToInt($item);
    }
}

fclose($file);

echo PHP_EOL . $sum . PHP_EOL . PHP_EOL;


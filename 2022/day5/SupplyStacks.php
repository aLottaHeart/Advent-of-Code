<?php

require_once 'Misc.php';

$filename = "input.txt";
if (!file_exists($filename)) {
    echo "Input file not found!" . PHP_EOL;
    exit;
}

$file = fopen($filename, "rb");

$crates = readCrateInput($file);

while ($line = fgets($file)) {
    if (strpos($line, 'move') === false) {
        continue;
    }

    $matches = explode(' ', $line);
    $amount = (int)$matches[1];
    $from = ((int)$matches[3]) - 1;
    $to = ((int)$matches[5]) - 1;

    for ($i = 0; $i < $amount; $i++) {
        $crates[$to][] = array_pop($crates[$from]);
    }
}
fclose($file);

$solution = "";
foreach ($crates as $crate) {
    $solution .= end($crate);
}
echo PHP_EOL . $solution . PHP_EOL;
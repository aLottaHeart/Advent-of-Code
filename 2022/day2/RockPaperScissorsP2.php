<?php

$filename = "input.txt";
if (!file_exists($filename)) {
    echo "Input file not found!" . PHP_EOL;
    exit;
}
$file = fopen($filename, "r");

$score = 0;

while ($line = fgets($file)) {
    switch (trim($line)) {
        case 'A X':
            $score += (3 + 0);
            break;
        case 'A Y':
            $score += (1 + 3);
            break;
        case 'A Z':
            $score += (2 + 6);
            break;
        case 'B X':
            $score += (1 + 0);
            break;
        case 'B Y':
            $score += (2 + 3);
            break;
        case 'B Z':
            $score += (3 + 6);
            break;
        case 'C X':
            $score += (2 + 0);
            break;
        case 'C Y':
            $score += (3 + 3);
            break;
        case 'C Z':
            $score += (1 + 6);
            break;
    }
}

fclose($file);

echo PHP_EOL . $score . PHP_EOL . PHP_EOL;
<?php
/**
 * Created by PhpStorm.
 * User: syo
 * Date: 2018/03/31
 * Time: 8:19
 */

$input_filename = __DIR__ . "/rapidus.php";
$output_filename = __DIR__ . "/rapidus";

$fpr = fopen($input_filename, 'r');
$fpw = fopen($output_filename, 'w');

while ($line = fgets($fpr)) {
    if (strpos($line, 'require_once') !== false) {
        print($line);
        $start = strpos($line, "'") + 1;
        $end = strpos($line, ')') - $start - 1;
        $filePath = substr($line, $start, $end);
        $getFiles = file(__DIR__ . $filePath);
        unset($getFiles[0]);
        foreach ($getFiles as $getFile) {
            fwrite($fpw, $getFile);
        }
        fwrite($fpw, "\n\n");
    } else {
        fwrite($fpw, $line);
    }
}

fclose($fpr);
fclose($fpw);
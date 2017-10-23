<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 7-4-2017
 * Time: 17:32
 */
$pad = $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/counter/counter.txt';
$f = fopen($pad, "w");
fwrite($f, 0);
fclose($f);

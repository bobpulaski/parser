<?php

require_once('vendor/autoload.php');
require_once('algoritmselect.php');

use DiDom\Document;
use DiDom\Query;

$url = 'https://penzastore.ru/kotly-otopitelnye/gazovye-kotly/aton-aogvm-125-em-vert-dymohod.html';

$document = file_get_contents($url);

function get_string_between($string, $start, $end){
    $string = "".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}

$fullstring = $document;

$parsed = get_string_between($fullstring, '<title>', '</title>');


echo $parsed; // (result = dog)

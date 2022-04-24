<?php

require_once ('vendor/autoload.php');

use DiDom\Document;
use DiDom\Query;

$url = 'https://www.pogodavdome73.ru/categories/gazovye-kotly?page=14';


while ($document = @file_get_contents ($url) !== FALSE) {
    $document = new Document($url, true);
    $i = 0;
    $links = '';

    while (isset($document->find ('a[class="products-view-picture-link"]')[$i])) {
        $link = '"' . $document->find ('a[class="products-view-picture-link"]')[$i]->getAttribute ('href') . '",' . PHP_EOL;
        $links .= $link;
        $i++;
    }

    echo $links;
}







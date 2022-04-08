<?php

require_once('vendor/autoload.php');
use DiDom\Document;
use DiDom\Query;

$all = '';

$attributes = '';


$urls = array(
    "https://www.pogodavdome73.ru/products/kotel-elektricheskii-kessel-evp-4-5-220v",
    "https://www.pogodavdome73.ru/products/evan-epo-30-1",
    
);

$start = microtime(true);

for ($n = 0; $n <= count($urls) - 1; $n++) {
    
    echo 'Loading... ' . $urls[$n] . PHP_EOL;
    $start_inner = microtime(true);

    
    $document = new Document($urls[$n], true);

    $name = $document->find('h1')[0]->text();
    $price = str_replace(' ', '', $document->find('.price-number')[0]->text());
    $category = 'Котлы отопительные|Электрические котлы;';
    $image = $document->find('a[class="gallery-picture-link link-text-decoration-none"]')[0]->getAttribute('href');
    $model = $document->find('meta[itemprop=sku]')[0]->getAttribute('content');
        

    $specifications = include(__DIR__.'/specifications_array.php');

    $steps = '';
    for ($i = 0; $i <= count($specifications) - 1; $i++) {
        if (isset($document->find("//div[@class='properties-item-name' and contains(text(), '$specifications[$i]')]", Query::TYPE_XPATH)[0])) 
        {
            
            $step = 'Характеристики|' . trim($document->find("//div[@class='properties-item-name' and contains(text(), '$specifications[$i]')]", Query::TYPE_XPATH)[0]->text()) .
                '|' .  trim($document->find("//div[@class='properties-item-name' and contains(text(), '$specifications[$i]')]/following::span", Query::TYPE_XPATH)[0]->text());
                $steps .= trim($step) . PHP_EOL;
        }
    } 

    $attributes .= $steps;
    $all .= ($name . ';' . $price . ';' . $category . $image . ';' . '"' . $attributes . '"' . ';' . ('KSO-' . $model) . PHP_EOL);
    $attributes = '';

    echo ' Parsing ' . round(microtime(true) - $start_inner, 2) . ' секунд' . PHP_EOL;
    
}



$headers = '_NAME_;_PRICE_;_CATEGORY_;_IMAGE_;_ATTRIBUTES_;_MODEL_';
$summary = $headers . PHP_EOL . $all;
//$summary = $headers . PHP_EOL . $names . ';' . $price . ';' . $category . $image . ';' . '"' . $attributes . '"' . ';' . 'KSO-TTTT0240' . PHP_EOL;

$file = fopen(__DIR__.'/CSV/kotl-electro.csv', 'w');
fwrite($file, $summary); // Запись в файл
fclose($file); // Закрытие файла

echo 'Скрипт был выполнен за ' . round(microtime(true) - $start, 2) . ' секунд';






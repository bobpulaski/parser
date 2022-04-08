<?php

require_once('vendor/autoload.php');
use DiDom\Document;
use DiDom\Query;

$all = '';

$attributes = '';


$urls = array(
    "https://www.pogodavdome73.ru/products/lemax-premium-ksg-12-5",
    "https://www.pogodavdome73.ru/products/lemax-aogv-8-1-sit-gazovik",
    "https://www.pogodavdome73.ru/products/lemax-aogv-11-6-1-sit-gazovik",
    /* "https://www.pogodavdome73.ru/products/lemax-aogv-15-5-1-sit-gazovik",
    "https://www.pogodavdome73.ru/products/vargaz-aogvk-11-6-eurosit",
    "https://www.pogodavdome73.ru/products/lemax-premier-ksg-11-6",
    "https://www.pogodavdome73.ru/products/don-eko-ksg-16-s",
    "https://www.pogodavdome73.ru/products/don-eko-ksg-20-s",
    "https://www.pogodavdome73.ru/products/borinskoe-aogv-17-4",
    "https://www.pogodavdome73.ru/products/danko-ksg-vsn-40",
    "https://www.pogodavdome73.ru/products/rga-aogvk-11-6-isp-11-classic",
    "https://www.pogodavdome73.ru/products/vargaz-aogv-17-4",
    "https://www.pogodavdome73.ru/products/danko-24s",
    "https://www.pogodavdome73.ru/products/borinskoe-kotel-aogv-11-6-1-b-sit",
    "https://www.pogodavdome73.ru/products/borinskoe-akgv-23-2-sit",
    "https://www.pogodavdome73.ru/products/lemax-classic-12-5-eurosit",
    "https://www.pogodavdome73.ru/products/lemax-classic-10-eurosit", */
);

$start = microtime(true);

for ($n = 0; $n <= count($urls) - 1; $n++) {
    
    echo 'Loading... ' . $urls[$n] . PHP_EOL;
    $start_inner = microtime(true);

    
    $document = new Document($urls[$n], true);

    $name = $document->find('h1')[0]->text();
    $price = str_replace(' ', '', $document->find('.price-number')[0]->text());
    $category = 'Котлы отопительные|Газовые котлы;';
    $image = $document->find('a[class="gallery-picture-link link-text-decoration-none"]')[0]->getAttribute('href');
    $model = $document->find('meta[itemprop=sku]')[0]->getAttribute('content');
    $meta_description = 'Купить ' . $name . ' в Пензе с бесплатной доставкой по России. Выгодная цена, оплата при получении, скидки и акции, гарантия. Описание, фото и отзывы на товар.';
            

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
    $all .= ($name . ';' . $price . ';' . $category . $image . ';' . '"' . $attributes . '"' . ';' . ('KSO-' . $model) .';' . $meta_description . PHP_EOL);
    $attributes = '';

    echo ' Parsing ' . round(microtime(true) - $start_inner, 2) . ' секунд' . PHP_EOL;
    
}

$headers = '_NAME_;_PRICE_;_CATEGORY_;_IMAGE_;_ATTRIBUTES_;_MODEL_;_META_DESCRIPTION_';
$summary = $headers . PHP_EOL . $all;
//$summary = $headers . PHP_EOL . $names . ';' . $price . ';' . $category . $image . ';' . '"' . $attributes . '"' . ';' . 'KSO-TTTT0240' . PHP_EOL;

$file = fopen(__DIR__.'/CSV/kotl_gaz.csv', 'w');
fwrite($file, $summary); // Запись в файл
fclose($file); // Закрытие файла

echo 'Скрипт был выполнен за ' . round(microtime(true) - $start, 2) . ' секунд';






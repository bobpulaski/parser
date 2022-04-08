<?php

require_once 'phpparcer/simple_html_dom.php';

$html = file_get_html('https://www.pogodavdome73.ru/products/rga-aogvk-11-6-isp-11-classic');

    foreach($html->find('h1') as $name) 
    {
        echo $name->innertext;
        echo "<br/>";
    }

    foreach($html->find('<div class="price-number">') as $price) 
    {
        //echo $price->outerntext;
        echo $html;
    }
    
    
    
$html->clear(); // подчищаем за собой
unset($html);


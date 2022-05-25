<?php

require_once ('vendor/autoload.php');

use DiDom\Document;
use DiDom\Query;

// 1. Указываем URL для парсинга ссылок раздела
$url = 'https://www.pogodavdome73.ru/categories/schetchiki-gaza';

$prefix = '?page=';
$page = 1;

$links = '';

while ($document = @file_get_contents ($url. $prefix . strval($page)) !== FALSE) {
    $document = new Document($url. $prefix . strval($page), true);
    $i = 0;
    $page++;

    while (isset($document->find ('a[class="products-view-picture-link"]')[$i])) {
        $link = '"' . $document->find ('a[class="products-view-picture-link"]')[$i]->getAttribute ('href') . '",' . PHP_EOL;
        $links .= $link;
        $i++;
    }

    echo $links;
}

//Снова загружаем первую страницу раздела
$document = new Document($url, true);

//Получаем и транслитерируем из названия рубрики имя фала
$filename = translit_sef($document->find('span[class="breads-item-current cs-t-3"]')[0]->text()) . '.php';

$summary = '<?php' . PHP_EOL . 'return array(' . PHP_EOL . $links . ');' . PHP_EOL;
//
$file = fopen(__DIR__ . '/URLS/' . $filename, 'w');
fwrite($file, $summary); // Запись в файл
fclose($file); // Закрытие файла


function translit_sef($value)
{
    $converter = array(
        'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
        'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
        'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
        'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
        'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
        'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
        'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
    );

    $value = mb_strtolower($value);
    $value = strtr($value, $converter);
    $value = mb_ereg_replace('[^-0-9a-z]', '-', $value);
    $value = mb_ereg_replace('[-]+', '-', $value);
    $value = trim($value, '-');

    return $value;
}







<?php


function selectParcer($wtf)
{

    switch ($wtf) {
        case 'gazovye-kotly.php':
            return array('Котлы отопительные|Газовые котлы;', '/CSV/gazovye-kotly.csv', '/URLS/gazovye-kotly.php');
            break;
        case 'elektricheskie-kotly.php':
            return array('Котлы отопительные|Электрические котлы;', '/CSV/elektricheskie-kotly.csv', '/URLS/elektricheskie-kotly.php');
            break;

        case 'gazovye-kolonki.php':
            return array('Колонки газовые;', '/CSV/gazovye-kolonki.csv', '/URLS/gazovye-kolonki.php');
            break;

        case 'boylery-kosvennogo-nagreva.php':
            return array('Водонагреватели|Бойлеры косвенного нагрева;', '/CSV/boylery-kosvennogo-nagreva.csv', '/URLS/boylery-kosvennogo-nagreva.php');
            break;

        case 'vodonagrevateli-nakopitelnye-elektricheskie.php':
            return array('Водонагреватели|Водонагреватели накопительные электрические;', '/CSV/vodonagrevateli-nakopitelnye-elektricheskie.csv', '/URLS/vodonagrevateli-nakopitelnye-elektricheskie.php');
            break;

        case 'konvektory.php':
            return array('Отопительные приборы|Конвекторы;', '/CSV/konvektory.csv', '/URLS/konvektory.php');
            break;

        case 'obogrevateli.php':
            return array('Отопительные приборы|Обогреватели;', '/CSV/obogrevateli.csv', '/URLS/obogrevateli.php');
            break;

            case 'radiatory.php':
            return array('Отопительные приборы|Радиаторы;', '/CSV/radiatory.csv', '/URLS/radiatory.php');
            break;

        case 'nasosy.php':
            return array('Насосы;', '/CSV/nasosy.csv', '/URLS/nasosy.php');
            break;

        case 'schetchiki-vody.php':
            return array('Счетчики|Счетчики воды;', '/CSV/schetchiki-vody.csv', '/URLS/schetchiki-vody.php');
            break;
        case 'schetchiki-gaza.php':
            return array('Счетчики|Счетчики газа;', '/CSV/schetchiki-gaza.csv', '/URLS/schetchiki-gaza.php');
            break;

    }
}

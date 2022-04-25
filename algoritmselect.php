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
    }
}

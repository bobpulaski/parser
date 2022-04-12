<?php

   
    function selectParcer($wtf) {
    
        switch ($wtf) {
            case 1:
                return array('Котлы отопительные|Газовые котлы;', '/CSV/kotl_gaz.csv', '/URLS/01-gaz-kotel.php');
                break;
            case 2:
                return array('Котлы отопительные|Электрические котлы;', '/CSV/kotl-electro.csv', '/URLS/02-electro-kotel.php');
                break;
        }
    }

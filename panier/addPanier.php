<?php
    require_once '/wamp64/www/devoir/webProject/util/DAO.php';

    require_once './panierDAO.php';
////Just un test
$pd=new panierDAO();

print_r($pd->insert());


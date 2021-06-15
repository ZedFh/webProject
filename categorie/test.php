<?php
require_once '../util/DAO.php';
require_once './categorieDAO.php';

$dd = new categorieDAO();

echo '<pre>';

print_r($dd->selectAll());

echo '</pre>';
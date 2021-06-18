<?php
    require_once '/wamp64/www/devoir/webProject/util/DAO.php';

    require_once "/wamp64/www/devoir/webProject/categorie/categorieDAO.php";
    $cd = new categorieDAO();
    if(isset($_GET['idCategorie'])){
        $cd->delete($_GET);
    }
    header('Location: ../Pageadmin.php?op=visualiseCategorie');



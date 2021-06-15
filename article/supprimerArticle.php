<?php

require '/wamp64/www/devoir/webProject/article/articleDAO.php';


$ud = new articleDAO();

    

if(isset($_GET['idArticle'])){
    $ud->delete($_GET);
    header('Location: ../Pageadmin.php');
}
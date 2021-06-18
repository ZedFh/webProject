<?php
        require_once '/wamp64/www/devoir/webProject/util/DAO.php';

   require_once 'articleDAO.php';
    
    $ar= new articleDAO();
    if(isset($_POST['Annuler']))
        header('Location: ../Pageadmin.php');
    if(isset($_POST['nomA']) && isset($_POST['pathImage']) && isset($_POST['categorie']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['quatiteStock'])){
        $u['nomA']=$_POST['nomA'];
        $u['pathImage']=$_POST['pathImage'];
        $u['idCategorie']=$_POST['categorie'];
        $u['description']=$_POST['description'];
        $u['prix']=$_POST['prix'];
        $u['quatiteStock']=$_POST['quatiteStock'];
        $ar->insert($u);
        header('Location: ../Pageadmin.php');
    }








?>
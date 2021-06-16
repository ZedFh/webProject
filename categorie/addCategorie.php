<?php
    require '/wamp64/www/devoir/webProject/util/DAO.php';
    require '/wamp64/www/devoir/webProject/categorie/categorieDAO.php';



    $cd= new categorieDAO();
    if(isset($_POST['libelle'])){
        $u['libelle']=$_POST['libelle'];
        $cd->insert($u);
        
    }

    header('Location: ../Pageadmin.php');


?>
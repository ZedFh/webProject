<?php 
require_once './util/DAO.php';
require_once './userDAO.php';

$ud= new UserDAO();

if(isset($_POST['email']) && isset($_POST['mdp'])){
    $_POST['mdp']=md5($_POST['mdp']);
    $res=$ud->select($_POST);

    if($res===null){
        $_SESSION['errorConnexion']="utilisateur ou mot de passe introuvable";
        header('Location: ./login.php');
    }
    else{
        $_SESSION['user']=$res['email'];
        $_SESSION['Role']=$res['Role'];
        if($ $_SESSION['Role']==0)
            header('Location: ./pageAcceuil.php');
        elseif( $_SESSION['Role']==1)
            header('Location: ./pageAdmin');
    }
}
<?php
    require_once '/wamp64/www/devoir/webProject/util/DAO.php';
    require_once '/wamp64/www/devoir/webProject/user/userDAO.php';

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['mdp']);

    $ud = new UserDAO();
    $u['email']=$email;
    $row = $ud->checkExist($u);
    $email = strtolower($email);

    if($row == null){
        if(strlen($nom) <= 100){
            if(strlen($prenom) <= 100){
                if(strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $_POST['nom']=$nom;
                            $_POST['prenom']=$prenom;
                            $_POST['email']=$email;
                            $_POST['mdp']= md5($_POST['mdp']);
                            print_r($_POST);
                            $ud->insert($_POST);
                            
                            header('Location:inscription.php?reg_err=success');
                           
                            
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=prenom_length'); die();}
        }else{ header('Location: inscription.php?reg_err=nom_length'); die();}
    }else{ header('Location: inscription.php?reg_err=already'); die();}
}
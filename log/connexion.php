<?php
    session_start();
    require_once 'config.php';

    if(!empty($_POST['email']) && !empty($_POST['mdp']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['mdp']);

        $email = strtolower($email);

        $check = $bdd->prepare('SELECT email, mdp FROM login WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();



    if($row == 1)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
                $password = hash('sha256',$password);

                if($data['mdp'] === $password)
                {
                    $_SESSION['user'] = $data['email'];
                    header('Location:landing.php');die();
                }else{ header('Location: index.php?login_err=password');die(); }
            }else{ header('Location: index.php?login_err=email');die(); }
        }else{ header('Location: index.php?login_err=already');die(); }
    }else{ header('Location: index.php');die();}
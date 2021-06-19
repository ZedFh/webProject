<?php
require_once './util/DAO.php';
require_once './userDAO.php';

$ud= new UserDAO();

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp'])){
$_POST['mdp']=md5($_POST['mdp']);
$ud->insert($_POST);
header('Location: ../pageAcceuil.php');
}
header('Location: ./login.php');


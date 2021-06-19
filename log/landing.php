<?php
session_start();
require_once 'config.php';
if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}

$req = $bdd->prepare('SELECT * FROM user WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>
<!doctype html>
<html lang="en">
<head>
    <title>Espace membre</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


        <div class="text-center">
            <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
            <hr />
            <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#change_password">
                Changer mon mot de passe
            </button>
        </div>
    </div>
</div>

</body>
</html>
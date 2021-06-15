<?php

require './user/userDAO.php';
require './article/articleDAO.php';


DAO::connect('localhost','test','root','password');
$nombreUtilisateurs = 5;
$nombreArticle = 20;
$nombreCatégorie = 3;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a2a10b07bd.js"></script>

  <link href="style.css" rel="stylesheet">

</head>
<body>
<section class="p-5 bg-light">
     <div class="row justify-content-center align-items-center">
      <div class="col text-center">
         <i class="fa fa-users fa-4x"></i>
         <div>
            <h4 class="text-dark m-t-0 m-b-5">Nombre d'utilisateurs : <b><?php echo $nombreUtilisateurs?></b></h4>
              <a href="#Utilisateur" class="btn btn-success btn-lg px-4 m-2">Visualiser</a>
         </div>
      </div>
      <div class="col text-center">
         <i class="fa fa-question fa-4x"></i>
         <div>
            <h4 class="text-dark m-t-0 m-b-5">Nombre d'articles : <b><?php echo $nombreArticle?></b></h4>
            <a href="#Articles" class="btn btn-dark btn-lg px-4 m-2">Visualiser</a>
            <a href="./article/articleForm.php" class="btn btn-success btn-lg px-4 m-2">Ajouter Article</a>
         </div>
      </div>
       <div class="col text-center">
         <i class="fab fa-buffer fa-4x"></i>
         <div>
            <h4 class="text-dark m-t-0 m-b-5">Nombre de catégories : <b><?php echo $nombreCatégorie ?></b></h4>
            <a href="#Categories" class="btn btn-dark btn-lg px-4 m-2">Visualiser</a>
            <a href="#Ajouter Categorie" class="btn btn-success btn-lg px-4 m-2">Ajouter Catégorie</a>
         </div>
      </div>
    </div>
  </section>

   <!-- UTILISATEUR -->
   <section class="p-5 bg-light" id="Utilisateur">
    <h2 class="text-danger">La liste des utilisateurs</h2>
    <br>
    <div class="fresh-table">
      <table id="fresh-table" class="table">   
        <thead>
          <th>Prenom</th>
          <th data-sortable="true">Nom</th>
          <th data-sortable="true">E-mail</th>
          <th data-sortable="true">Date de naissance</th>
          <th >N° rue</th>
          <th >Rue</th>
          <th >Ville</th>
          <th >Code postal</th>
        </thead>

        <tbody>
        <?php
              $ud= new UserDAO();
              $dataUsers= $ud->selectAll();
              foreach( $dataUsers as $d)
              {
        ?>      
                <tr>
                      <td><?php echo $d['prenom'] ?></td>
                      <td><?php echo $d['nom'] ?></td>
                      <td><?php echo $d['email'] ?></td>
                      <td><?php echo $d['naissance'] ?></td>
                      <td><?php echo $d['Nrue'] ?></td>
                      <td><?php echo $d['rue'] ?></td>
                      <td><?php echo $d['Pays'] ?></td>
                      <td><?php echo $d['codePostal'] ?></td>
                </tr>
        <?php
               }
        ?>               
        </tbody>
      </table>
    </div>
  </section>
  <!-- FIN UTILISATEUR -->

  <!-- ARTICLES -->
   <section class="p-5 bg-light" id="Articles">
      <h2 class="text-success">La liste des Articles</h2>
      <br>
      <div class="fresh-table">
        <table id="fresh-table" class="table">         
          <thead>
            <th data-sortable="true">Image</th>
            <th>Article</th>
            <th data-sortable="true">Catégorie</th>
            <th data-sortable="true">Description</th>
            <th data-sortable="true">Prix</th>
            <th data-sortable="true">Quantité</th>
            <th data-field="actions">Action</th>
          </thead>

          <tbody>
          <?php
              $ad= new articleDAO();
              $dataArticles = $ad->selectAll();
              foreach( $dataArticles as $d)
              {?>     
                  <tr>
                        <td> <img src="img/articles/<?php echo $d['pathImage'] ?>" height="50" width="50"></td>
                        <td><?php echo $d['nomA'] ?></td>
                        <td><?php echo $d['libelle'] ?></td>
                        <td><?php echo $d['description'] ?></td>
                        <td><?php echo $d['prix'] ?></td>
                        <td><?php echo $d['quatiteStock'] ?></td>
                        <td><a href="./article/supprimerArticle.php?idArticle <?=$d['idArticle'] ?>" role= "button" id="supprimer">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </a>
                        </td>
                                  
                  </tr>
                <?php
                  }
                  ?>               
          </tbody>
            
        </table>
      </div>
    </section>

  
</body>
</html>
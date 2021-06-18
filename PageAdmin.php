<?php

require './user/userDAO.php';
require './article/articleDAO.php';
require './categorie/categorieDAO.php';
$ud= new UserDAO();
$ad= new articleDAO();
$cd = new categorieDAO();


$nombreUtilisateurs= $ud->count()[0]['q'];
$nombreArticle = $ad->count()[0]['q'];
$nombreCatégorie = $cd->count()[0]['q'];


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

 

  <link href="monstyle.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-dark navbar-expand p-0 bg-danger">
        <div class="container">
            <ul class="navbar-nav d-none d-md-flex mr-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Delivery</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
            </ul>
            <ul class="navbar-nav">
            <li  class="nav-item"><a href="#" class="nav-link"> Livraison gratuite pour les commandes de plus de €75 </a></li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> English </a>
                <ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
                <li><a class="dropdown-item" href="#">Arabic</a></li>
                <li><a class="dropdown-item" href="#">Frensh </a></li>
                </ul>
            </li>
          </ul> <!-- list-inline //  -->
          </div> <!-- navbar-collapse .// -->
        </div> <!-- container //  -->
    </nav> <!-- header-top-light.// -->

    <header class="section-header">

<section class="header-main border-bottom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-2 col-4">
        <div class="brand-wrap">
          <img class="logo" src="../../data/images/stop-shop-logo.jpg">
        </div> 
      </div>
      <div class="col-lg-6 col-sm-12 order-3 order-lg-2">

      </div> <!-- col.// -->
      <div class="col-lg-4 col-sm-6 col-8 order-2 order-lg-3">
        <div class="widgets-wrap float-md-right">
          <div class="widget-header  mr-3">
            <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
            <span class="badge badge-pill badge-danger notify">0</span>
          </div>
          <div class="widget-header icontext">
            <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
            <div class="text">
              <span class="text-muted">Welcome!</span>
              <div> 
                <a href="#">Sign in</a> |
                <a href="#"> Register</a>
              </div>
            </div>
          </div>
        </div> <!-- widgets-wrap.// -->
      </div> <!-- col.// -->
    </div> <!-- row.// -->
  </div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->









<section class="p-5 bg-light">
     <div class="row justify-content-center align-items-center">
      <div class="col text-center">
         <i class="fa fa-users fa-4x"></i>
         <div>
            <h4 class="text-dark m-t-0 m-b-5">Nombre d'utilisateurs : <b><?php echo $nombreUtilisateurs?></b></h4>
              <a href="?op=visualiseUser" class="btn btn-success btn-lg px-4 m-2">Visualiser</a>
         </div>
      </div>
      <div class="col text-center">
         <i class="fa fa-question fa-4x"></i>
         <div>
            <h4 class="text-dark m-t-0 m-b-5">Nombre d'articles : <b><?php echo $nombreArticle?></b></h4>
            <a href="?op=visualiseArticle" class="btn btn-dark btn-lg px-4 m-2">Visualiser</a>
            <a href="./article/articleForm.php" class="btn btn-success btn-lg px-4 m-2">Ajouter Article</a>
         </div>
      </div>
       <div class="col text-center">
         <i class="fab fa-buffer fa-4x"></i>
         <div>
            <h4 class="text-dark m-t-0 m-b-5">Nombre de catégories : <b><?php echo $nombreCatégorie ?></b></h4>
            <a href="?op=visualiseCategorie" class="btn btn-dark btn-lg px-4 m-2">Visualiser</a>
            <a href="./categorie/categorieForm.php" class="btn btn-success btn-lg px-4 m-2">Ajouter Catégorie</a>
         </div>
      </div>
    </div>
  </section>
    <?php 
      $_GET['visibility']='hidden';
      if(isset($_GET['op'])){
        $_GET['visibility']='visible';
        if($_GET['op']==="visualiseUser"){
      
    
    ?>
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
               <?php }
               
               elseif($_GET['op']==="visualiseArticle"){
              
               ?>
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
              
              $dataArticles = $ad->selectAll();
              foreach( $dataArticles as $d)
              {?>     
                  <tr>
                        <td> <img src="img/articles/<?php echo $d['pathImage'] ?>" height="50" width="50"></td>
                        <td><?php echo $d['nomA'].' '.$d['idArticle'] ?></td>
                        <td><?php echo $d['libelle'] ?></td>
                        <td><?php echo $d['description'] ?></td>
                        <td><?php echo $d['prix'] ?></td>
                        <td><?php echo $d['quatiteStock'] ?></td>
                        <td><a href="./article/supprimerArticle.php?idArticle= <?=$d['idArticle'] ?>"  id="supprimer">
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

    <?php }
      elseif($_GET['op']==="visualiseCategorie"){
       
         ?>  

    <section class="p-5 bg-light" id="Categorie">
      <h2 class="text-success">La liste des Categories</h2>
      <br>
      <div class="fresh-table">
        <table id="fresh-table" class="table">         
          <thead>
            <th data-sortable="true">Libelle</th>
          </thead>

          <tbody>
          <?php
              
              $dataCategorie = $cd->selectAll();
              foreach( $dataCategorie as $d)
              {?>     
                  <tr>
                        <td><?php echo $d['libelle'] ?></td>
                        <td><a href="./categorie/supprimerCategorie.php?idCategorie= <?=$d['idCategorie'] ?>"  id="supprimer">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </a>
                        </td>
                                  
                  </tr>
                <?php
                  }
                  ?>          
          </tbody>
             <?php } 
                else{
                  $_GET['visibility']='hidden';
                 
                }
                
                } ?>
                  <a href="?op=rien" style="visibility:<?=$_GET['visibility']?>;"  class="btn btn-dark btn-lg px-4 m-2">retour</a>
  
















</body>
</html>
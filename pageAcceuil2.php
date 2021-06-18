<?php

require './article/articleDAO.php';
require './categorie/categorieDAO.php';

$ad= new articleDAO();
$cd = new categorieDAO();

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page d'acceuil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a2a10b07bd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src = "js/main.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="style2.css" rel="stylesheet" >
    <link href="monstyle.css" rel="stylesheet">

</head>
<body>

    <!-- Sidebar-->
    <div class="wrapper">
        <!-- Sidebar  -->
        <!--... FILTRES ...-->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Filtrer</h3>
            </div>

            <ul class="list-unstyled components">
            
                <!-- filtre Categorie -->
                <li class="active">
                    <a href="#FiltreCategorie" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Catégorie</a>
                    <ul class="collapse list-unstyled" id="FiltreCategorie">
                    <?php
                        $dataCategorie = $cd->selectAllFor();
                        foreach( $dataCategorie as $d)
                        {?>

                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  class="custom-control-input" name="cat[]" value=<?=$d['idCategorie'] ?>>
                                    <div class="custom-control-label"><?php echo $d['libelle'] ?> 
                                        <b class="badge badge-pill badge-light float-right"><?=$d['q']?></b>  
                                    </div>
                            </label>

                        <?php
                        }?>
                    </ul>
                </li>
                <!-- Fin filtre Categorie -->

                <!-- Filtre Prix -->                  
                <li>
                    <a href="#FiltrePrix" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Prix</a>
                    <ul class="collapse list-unstyled" id="FiltrePrix">
                        <div style = "margin-left : 20px; margin-right : 20px;">
                            <input type="range" class="custom-range" min="0" max="100" name="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input class="form-control" placeholder="0€" type="number" name="prixmin" id="prixmin">
                                    </div>
                                    <div class="form-group text-right col-md-6">
                                        <label>Max</label>
                                        <input class="form-control" placeholder="1,0000€" type="number" name="prixmax" id="prixmax">
                                    </div>
                                </div> 
                                <button class="btn btn-block btn-primary">Valider</button>
                        </div>
                    </ul>
                </li>
                <!-- Fin Filtre Prix -->                  
            </ul>
        </nav>
        <!--... Fin FILTRES ...-->

        <!-- Page Content  -->
        <div id="content">
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span>Filtrer</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>
                    </div>
                    <div class="col-4 text-center">
                        <a class="navbar-brand" href="#">
                            <img src="./img/Logo.jpeg" height="80" alt="Logo">
                        </a>                        
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="#!" class="nav-link navbar-link-2 waves-effect">
                                    <span class="badge badge-pill red">nbr</span>
                                    <i class="fas fa-shopping-cart pl-0"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link waves-effect">Sign in</a>
                            </li>
                            <li class="nav-item pl-2 mb-2 mb-md-0">
                                <a href="#!" type="button" class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">Sign up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--Navbar-->

            
            <main class="col-md-9">
                
                <?php
                            if(!isset($_GET['page'])){
                                $count=$ad->countForDisplay()[0]['q'];
                                $dataArticles = $ad->selectAll();
                                $_SESSION["count"]= $count;
                                $_SESSION["dataArticle"]=$dataArticles;
                                echo $_SESSION["count"];
                            
                            }
                            else{
                                if(isset($_SESSION["count"])){
                                    $count=$_SESSION["count"];
                                    $dataArticles=$_SESSION["dataArticle"];
                            }
                            else
                                echo "session introuvable";
                            }
                        $fin= $count/10+($count%10===0?0:1);
                        
                            if(isset($_GET['page'])){
                                $indice=$_GET['page'];
                                if($indice>$fin-1)
                                    $indice=0;
                            }
                            else    
                                $indice=0;
                        
                                //tri !
                                $i=2;
                                switch ($i) {
                                    case 0:
                                        usort( $dataArticles,function($a,$b){
                                            return $a['prix']-$b['prix'];
            
                                        });
                                        break;
                                    case 1:
                                        usort( $dataArticles,function($a,$b){
                                            return -($a['prix']-$b['prix']);
            
                                        });
                                        break;
                                    case 2:
                                        usort( $dataArticles,function($a,$b){
                                            return strcmp($a['nomA'],$b['nomA']);
            
                                        });
                                        break;

                                    case 3:
                                        usort( $dataArticles,function($a,$b){
                                            return -1*strcmp($a['nomA'],$b['nomA']);
                                        });
                                        break;
                                }


                            


                            for($i=0;$i<$fin;$i++){
                            
                            if($i==$indice){
                            ?>
                            <div class="row" id=<?=$i?>>

                                <?php 
                            }
                            else{
                                
                                ?>
                            <div class="row" id=<?=$i?> style="display:none;">

                            <?php
                            }
                            for($j=$i*10;$j<10*$i+10 && $j<$count;$j++){
                            
                            ?>   
                    
                            <!-- <form action="addPanier.php" method="POST"> -->
                                <div class="col-md-4">
                                    <figure class="card card-product-grid">
                                        <!-- img -->
                                        <div class="img-wrap"> 
                                            <img src="img/articles/<?php echo $dataArticles[$j]['pathImage'] ?>">
                                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Visualiser</a>
                                        </div>
                                        <!-- Fin img -->

                                        <!-- sous_titre -->
                                        <figcaption class="info-wrap">
                                            <div class="fix-height">
                                                <span class="nomA"><?php echo $dataArticles[$j]['nomA']?></span>
                                                <div class="price-wrap mt-2">
                                                    <span class="prix"><?php echo $dataArticles[$j]['prix'] ?> €</span>
                                                </div>
                                                <span class="prix"><input id="number" type="number" min="1" max=<?=$dataArticles[$j]['quatiteStock']?>></span>
                                            </div>
                                            <a href="" class="btn btn-block btn-primary">Ajouter au panier </a>
                                        </figcaption>
                                        <!-- Fin sous_titre -->

                                    </figure>
                                </div>
                                <!--</form>-->
                        <?php
                                
                        }
                        ?>
                        
                        </div>
                        <div style="display: flex;justify-content:space-around;">
                        <?php
                    }
                    for($i=0;$i<$fin-1;$i++){
                        ?>     
                            <div  ><a href="?page=<?=$i?>" style="padding:10px;" ><?=$i+1?></a>  </div>
                            <?php
                            }?>
                        </div>
            </main>
            <div class="footer text-center">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by COZII</a>
                </p>
	        </div>
        </div>
    </div>
   
    
</body>
<?php

require './article/articleDAO.php';
$ad= new articleDAO();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Page d'acceuil</title>
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
<section class="section-content padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-md-3">
                <div class="card">
                    ... Filtres ...<br>
                </div>
            </aside>

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
                                                <span class="prix"><?php echo $dataArticles[$j]['prix'] ?></span>
                                            </div>
                                            <span class="prix"><input id="number" type="number" min="1" max=<?=$dataArticles[$j]['quatiteStock']?>></span>
                                        </div>
                                        <a href="" class="btn btn-block btn-primary">Ajouter au panier </a>
                                    </figcaption>
                                    <!-- Fin sous_titre -->

                                </figure>
                            </div>
                            </form>
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
        </div>
    </div>
</body>
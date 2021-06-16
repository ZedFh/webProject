
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
<section class="p-5 bg-light text-center" id="AjouterArticle">
      <h2 class="text-danger">Ajouter Article</h2>
      <br>
    <form class="form-horizontal" role="form" method="POST" action="addCategorie" onreset='myFunction()'>
        <div class='row justify-content-center'>
            <div class="col-lg-6">
                       <div class="form-group" >
                    <label for="descriptionA" class="col-sm-2 control-label">Nom categorie :</label>
                    <div class="col">
                        <input type="text" class="form-control" name="libelle" id="libelle"required>
                    </div>
                </div>                  

            </div>                
        </div>

        <div class="row">
                                                                                
        <div class="col-lg-12 text-center">
            <button type="reset" class="btn btn-dark" name="Annuler">Annuler</button>
            <button type="submitt" class="btn btn-danger" name="AjouterCategorie">Enregistrer</button>
        </div>
    
        </div>
    </form>
    </section>

</body>
</html>


<script>
function myFunction() {
    window.location.replace('/webProject/PageAdmin.php');
}
</script>
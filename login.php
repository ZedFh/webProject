<?
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&family=Roboto+Condensed:wght@700&family=Sigmar+One&family=Ultra&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
      rel="stylesheet"
    />
    <style>
      .contenaire {
        background-color: rgb(60, 36, 122);
        height: 100%;
        font-family: Arial, Helvetica, sans-serif;
        padding: 40px;
        position: relative;
      }
      .wrap {
        max-width: 350px;
        border-radius: 20px;
        margin: auto;
        box-sizing: border-box;
        padding: 40px;
        color: #fff;
        background: rgba(0, 0, 0, 0.8);
      }
      .inscriTitle {
        text-align: center;
      }
    input[type="text"],
      input[type="password"],
      input[type="date"],
      input[type="email"],
      input[type="number"]
      {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 5px;
        background: rgba(0, 0, 0, 0.1);
        outline: none;
        border: none;
        border-bottom: 1px dotted #fff;
        color: #fff;
        border-radius: 5px;
        margin: 5px;
        font-weight: bold;
      }
      select{
        width: 100%;
        box-sizing: border-box;
        padding: 12px 5px;
        background: rgba(0, 0, 0, 0.1);
        outline: none;
        color: rgb(37, 10, 187);
        border-radius: 5px;
        margin: 5px;
        font-weight: bold;
      }
      input[type="submit"] {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 0px;
        margin-top: 30px;
        outline: none;
        border: none;
        background: #60adde;
        opacity: 0.7;
        border-radius: 20px;
        font-size: 20px;
        color: #fff;
      }
      input[type="submit"]:hover {
        background: #003366;
        opacity: 0.7;
      }
    </style>
  </head>
  <body>
    <header>
     <nav>
        <img src="images/icon.jpg" alt="" />
        <ul class="menu">
          <li>
            <a href="acceuil.jsp"> <span class="material-icons">home</span>Home </a>
          </li>
          <li>
            <a href="ConsulterTrajet">
              <span class="material-icons">search</span>Find Itinerary
            </a>
          </li>
          <li>
            <a href="#">
              <span class="material-icons">perm_identity</span>About Us
            </a>
          </li>
          <li>
            <a href="#">
              <span class="material-icons">help_outline</span>Need Help ?
            </a>
          </li>
          <?php if(!isset($_SESSION['utilisateur'])){ ?>
          <li>
            <a href="Authentification.php">
              <span>Connexion</span>
            </a>
          </li>
          <li>
            <a href="InscriptionServlet">
              <span>Inscription</span>
            </a>
          </li>
          <?}else{ ?>
           <li>
            <a href="Profil?id=<?=$_SESSION['utilisateur']?>">
              <span>Profil</span>
            </a>
          </li>
          <li>
            <a href="Deconnection">
              <span>Deconnection</span>
            </a>
          </li>
          <?} ?>
        </ul>
      </nav>
      <form action="AuthentificationServlet" method="post">
        <div class="contenaire">
            <p style="color:red;position:absolute;">
               <?php if(isset($_SESSION['Erreur'])){?>
               <? echo ($_SESSION['Erreur']);?>
               <?} ?>
            </p>
          <div class="wrap">
            <h1 class="inscriTitle">Connexion</h1>
            <input type="text" name="login" placeholder="Login" required />
            <input
              type="password"
              placeholder="password"
              required
              name="password"
            />
            <p style="padding-top: 10px;">
              vous n'avez pas un compte ?
              <a href="InscriptionServlet" style="color: rgb(167, 167, 167);">inscrivez-vous</a>
            </p>
            <input type="submit" value="Login" />
          </div>
        </div>
      </form>
    </header>
    <footer>
      <div>
        <img src="images/icon.jpg" alt="" />
      </div>
      <div>
        <h3>
          more informations<span><span></span></span>
        </h3>
        <ul>
          <li>
            <a href="help.jsp">
              <i class="material-icons">keyboard_arrow_right</i>Comment ça
              marche
            </a>
          </li>
          <?php if(!isset($_SESSION['utilisateur'])){ ?>
          <li>
            <a href="AuthentificationServlet">
              <span>Connexion</span>
            </a>
          </li>
          <li>
            <a href="InscriptionServlet">
              <span>Inscription</span>
            </a>
          </li>
          <?}else{ ?>
          <li>
            <a href="Profil?id=<?=$_SESSION['utilisateur'] ?>">
              <span>Profil</span>
            </a>
          </li>
          <li>
            <a href="Deconnection">
              <span>Deconnection</span>
            </a>
          </li>
          <?} ?>
          <li>
            <a href="ConsulterTrajet">
              <i class="material-icons">keyboard_arrow_right</i>Consulter les
              trajets
            </a>
          </li>
        </ul>
      </div>
      <div>
        <h3>
          à propos de Staypa<span><span></span></span>
        </h3>
        <ul>
          <li>
            <a href="aboutUs.jsp">
              <i class="material-icons">keyboard_arrow_right</i>Qui sommes-nous
              ?
            </a>
          </li>
          <li>
            <a href="motDeEquipe.jsp">
              <i class="material-icons">keyboard_arrow_right</i>Mot de l'equipe
              Staypa
            </a>
          </li>
        </ul>
      </div>
      <div>
        <h3>
          CONTACT<span><span></span></span>
        </h3>
        <ul>
          <li>
            <i class="material-icons">phone</i>
            <h3>+212 (0)661182058</h3>
          </li>
          <li>
            <i class="material-icons">email</i>
            <h3>support@staypa.ma</h3>
          </li>
        </ul>
      </div>
    </footer>
  </body>
</html>
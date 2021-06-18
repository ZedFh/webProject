<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Créer un compte</h2>
    </div>

    <form method="post" action="register.php">
        <div class="input-group">
            <label>Nom</label>
            <input type="text" nom="Nom" value="<?php echo $Nom; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Mot de passe</label>
            <input type="Mot de passe" name="Mot de passe">
        </div>
        <div class="input-group">
            <label>Répéter le mot de passe</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="continuer" class="btn" name="reg_user">Crée un compte</button>
        </div>
        <p>
            Vous êtes déjà membre? <a href="login.php">S'identifier</a> //login hia le code li haykun dj tdar pour se connecter
        </p>
    </form>
</body>
</html>
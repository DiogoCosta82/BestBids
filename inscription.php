<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <title>Best Bid's - Création de Compte</title>
</head>

<body>
    <header>
        <?php
        include __DIR__ . '/Nav/menu.php';


        $menu_liens = [
            '/BestBids/index.php' => 'Accueil',
            '/BestBids/login.php' => 'Connexion',

        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>


    <div class="formNew"></div>
    <form action="newUser.php" method="POST">

        <h2>Créer un compte utilisateur</h2>

        <label class="label">Nom :</label>
        <input name="last_name" type="text"></input><br>

        <label class="label">Prénom :</label>

        <input name="first_name" type="texte"></input><br>

        <label class="label">Adresse email :</label>

        <input name="email" type="texte"> </input><br>

        <label class="label">Mot de passe :</label>

        <input name="password" type="password"></input><br>

        <button class="buttonFormNew">Valider</button>
    </form>


    <footer>
        <?php include 'Nav/footer.php'; ?>
    </footer>




</body>

</html>
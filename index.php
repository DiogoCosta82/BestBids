<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Best Bid's</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <img src="images/logo.jpg" alt="logo" />
        <div class="title">
            <h1>Bienvenu sur Best Bid's</h1>
        </div>

        <nav>
            <div class="barNav">
                <a href="auctions.php">Annonces</a>
                <a class="incri" href="inscription.php">Inscription</a>
                <a class="signIn" href="signIn.php">Connexion</a>
                <a class="signOut" href="signOut.php">Déconnexion</a>
            </div>
        </nav>
    </header>
    <div class="bodyPage"></div>

    <form action="auctions.php" method="POST">

        <h2>Deposer votre annonce</h2>

        <label class="label">Photo annonce: </label>

        <input name="title" type="texte">
        </input><br>
        <label class="label">Titre: </label>

        <input name="prixDepart" type="texte">
        </input><br>
        <label class="label">Prix de départ: </label>

        <input name="marque" type="date">
        </input><br>
        <label class="label">Marque: </label>

        <input name="modele" type="texte">
        </input><br>
        <label class="label">Modèle: </label>

        <input name="annee" type="texte">
        </input><br>
        <label class="label">Année: </label>

        <input name="kms" type="texte">
        </input><br>
        <label class="label">Kms: </label>

        <input name="cv" type="texte">
        </input><br>
        <label class="label">CV: </label>

        <input name="couleur" type="date">
        </input><br>
        <label class="label">Couleur: </label>

        <input name="portes" type="date">
        </input><br>
        <label class="label">Portes: </label>

        <input name="places" type="date">
        </input><br>

        <label class="label">Places: </label>
        <input name="annee" type="text">
        </input><br>

        <label class="label">Combustible: </label>
        <input name="cumbustible" type="text">
        </input><br>

        <label class="label">Description: </label>
        <textarea name="description" type="texte">
        </textarea><br>

        <button class="send"> valider </button>
    </form>

    <footer>
        <p class="footerText"> © 2023 Best Bid's </p>

    </footer>

</body>

</html>
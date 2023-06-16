<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="bodyPage"></div>

    <form action="auctions.php" method="POST">

        <h2>Deposer votre annonce</h2>

        <label class="label">Photo annonce: </label>
        <input type="text" name="image" /><br>

        <label class="label">Titre: </label>
        <input name="title" type="text"></input><br>

        <label class="label">Prix de départ: </label>
        <input name="prixDepart" type="text"></input><br>

        <label class="label">Marque: </label>
        <input name="marque" type="date"></input><br>

        <label class="label">Modèle: </label>
        <input name="modele" type="text"></input><br>

        <label class="label">Date carte grise: </label>
        <input name="annee" type="date"></input><br>

        <label class="label">Kms: </label>
        <input name="kms" type="text"></input><br>

        <label class="label">CV: </label>
        <input name="cv" type="text"></input><br>

        <label class="label">Couleur: </label>
        <input name="couleur" type="text"></input><br>

        <label class="portes">Portes: </label>
        <select type="portes" name="format" placeholder="Portes">
            <option>...</option>
            <option>3 Portes</option>
            <option>4 Portes</option>
            <option>5 Portes</option>
        </select><br>

        <label class="places">Places: </label>
        <select type="places" name="format" placeholder="Places">
            <option>...</option>
            <option>2 Places</option>
            <option>4 Places</option>
            <option>5 Places</option>
        </select><br>
        <label class="combustible">Combustible: </label>
        <select type="combustible" name="format" placeholder="Combustible">
            <option>...</option>
            <option>Essence</option>
            <option>Gasoil</option>
            <option>GPL</option>
            <option>Hybride</option>
            <option>Electrique</option>
        </select><br>

        <label class="label">Description: </label>
        <textarea name="description" type="text">
        </textarea><br>

        <button class="send"> valider </button>
    </form>
</body>

</html>
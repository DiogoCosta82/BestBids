<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/creation_annonce.css" />
    <title>Best Bid's - Page annonces</title>
</head>

<body>
    <header>
        <?php
        include __DIR__ . '/Nav/menu.php';

        $menu_liens = [
            '/BestBids/index.php' => 'Accueil',
            '/BestBids/logout.php' => 'Déconnexion',
        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>

    <div class="container">
        <div class="card">

            <form action="newCar.php" method="POST">

                <h2>Deposer votre annonce</h2>


                <label class="label">Titre</label>
                <input name="title" type="text"></input><br>

                <label class="label">Photo annonce</label>
                <input name="image_href" type="text" /><br>

                <label class="label">Prix de départ</label>
                <input name="reserve_price" type="text"></input><br>

                <label class="label">Marque</label>
                <input name="brand" type="text"></input><br>

                <label class="label">Modèle</label>
                <input name="model" type="text"></input><br>

                <label class="label">CV</label>
                <input name="hp" type="text"></input><br>

                <label class="label">Description</label>
                <textarea name="description" type="text"></textarea><br>

                <label class="label">Date fin d'enchère</label>
                <input type="date" name="end_date" />
                <br>
                <button class="send">Valider</button>
            </form>

        </div>
    </div>
    <footer>
        <?php include 'Nav/footer.php'; ?>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <title>Best Bid's</title>
</head>

<body>
    <header>
        <?php
        include __DIR__ . '/Nav/menu.php';


        $menu_liens = [
            '/BestBids/inscription.php' => 'Inscription',
            '/BestBids/login.php' => 'Connexion',

        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>

    <?php

    try {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
    } catch (Exception $e2) {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
        $query = "SELECT * FROM auctions";
        $results = $dbh->query($query);
    }

    echo "<h1>Annonces en ligne</h1>";
    echo "<table>";
    echo "<tr><th>Titre</th><th>Image</th><th>Prix de Départ</th><th>Marque</th><th>Modèle</th><th>CV</th><th>Année</th><th>Couleur</th><th>Portes</th><th>Places</th><th>Combustible</th><th>Kms</th><th>Description</th><th>Date Annonce</th><th>Dernière mise à jour</th></tr>";
    foreach ($results as $auction) {
        echo "<tr>";
        echo "<td>" . $auction['title'] . "</td>";
        echo "<td>" . $auction['image'] . "</td>";
        echo "<td>" . $auction['reserve_price'] . "</td>";
        echo "<td>" . $auction['brand'] . "</td>";
        echo "<td>" . $auction['model'] . "</td>";
        echo "<td>" . $auction['hp'] . "</td>";
        echo "<td>" . $auction['year'] . "</td>";
        echo "<td>" . $auction['color'] . "</td>";
        echo "<td>" . $auction['doors'] . "</td>";
        echo "<td>" . $auction['places'] . "</td>";
        echo "<td>" . $auction['fuel'] . "</td>";
        echo "<td>" . $auction['kms'] . "</td>";
        echo "<td>" . $auction['description'] . "</td>";
        echo "<td>" . $auction['created_date'] . "</td>";
        echo "<td>" . $auction['updated_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    include 'Nav/footer.php'; ?>

</body>

</html>
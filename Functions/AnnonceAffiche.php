<?php
function AnnonceAffiche()
{

    try {
        // Connexion bd
        try {
            $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
        } catch (Exception $e) {
            $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
        }

        // Récupération des annonces
        $query = $dbh->prepare('SELECT * FROM auctions');
        $query->execute();
        $results = $query->fetchAll();

        // Affichage des annonces


        echo "<div class=\"cards\">";
        foreach ($results as $auction) {
            echo "<div class=\"card\">";
            echo "<h2>" . $auction['title'] . "</h2>";
            echo "<br>";
            echo "<img class=\"photo\" src=\"" . $auction['image_href'] . "\" alt=\"Image de l'annonce\">";
            echo "<p>Marque : " . $auction['brand'] . "</p>";
            echo "<p>Modèle: " . $auction['model'] . "</p>";
            echo "<br>";
            echo "<p>Prix de départ : €" . $auction['reserve_price'] . "</p>";
            echo "<p>Fin d'enchère : " . $auction['end_date'] . "</p>";
            echo "<br>";
            echo '<button class=btn><a href="annonce_detail.php?id=' . $auction['id_auction'] . '">Détails</a></button>';
            echo "</div>";
        }

        echo "</div>";
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la bd
        echo "Une erreur s'est produite lors de la connexion à la base de données : " . $e->getMessage();
    }
}
<?php
function AnnonceDetail()
{

    if (isset($_GET['id'])) {
        $id_auction = $_GET['id'];


        try {
            try {
                $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
            } catch (Exception $e) {
                $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
            }
        } catch (PDOException $e) {
            echo "Une erreur s'est produite lors de la connexion à la base de données. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
            die();
        }
        // Récupération des détails de l'auction à partir de son ID
        $query = $dbh->prepare("SELECT * FROM auctions WHERE id_auction = :id_auction");
        $query->bindParam(":id_auction", $id_auction);
        $query->execute();

        // Vérifier si auction existe dans la bd
        if ($query->rowCount() > 0) {
            $auction = $query->fetch(PDO::FETCH_ASSOC);

            // Afficher les détails de l'enchère
            echo "<div class=\"cards\">";
            echo "<div class=\"card\">";
            echo "<img class=\"photo\" src=\"" . $auction['image_href'] . "\" alt=\"Image de l'enchère\">";
            echo "<div class=\"detail\">";
            echo "<h2>" . $auction['title'] . "</h2>";
            echo "<br>";
            echo "<p>Marque : " . $auction['brand'] . "</p>";
            echo "<p>Modèle : " . $auction['model'] . "</p>";
            echo "<p>Puissance : " . $auction['hp'] . "</p>";
            echo "<p>Prix de départ : " . $auction['reserve_price'] . "</p>";
            echo "<p>Fin d'enchère : " . $auction['end_date'] . "</p>";
            echo "<p>Description : " . $auction['description'] . "</p>";
            echo "<button class= \"btn\"><a href=\"/BestBids/annonce_affiche.php\">Retour</a></button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "L'enchère sélectionnée n'existe pas.";
        }
    } else {
        echo "Aucune enchère sélectionnée.";
    }
}

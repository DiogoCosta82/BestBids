<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/styleCard.css" />
    <title>Best Bid's</title>

</head>

<body>
    <header>
        <?php
        include __DIR__ . '/Nav/menu.php';

        $menu_liens = [
            '/BestBids/inscription.php' => 'Inscription',
            '/BestBids/annonce.php' => 'Déposer Annonce',
            '/BestBids/login.php' => 'Connexion',


        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>
    <div>
        <main>

            <?php
            // Afficher la roue loading
            echo "<div class=\"loading-overlay\">";
            echo "<div class=\"loading-spinner\"></div>";
            echo "</div>";
            ?>

            <script>
            // Cacher la roue après un délai de 2000ms
            setTimeout(function() {
                document.querySelector('.loading-overlay').style.display = 'none';
            }, 1200);
            </script>

            <?php
            try {
                try {
                    $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
                } catch (Exception $e1) {
                    $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
                }
                // Récupération des annonces
                $query = "SELECT * FROM auctions LIMIT 4";
                $results = $dbh->query($query);

                // Affichage des annonces
            
                echo "<div class=\"cards\">";
                foreach ($results as $auction) {
                    echo "<div class=\"card\">";
                    echo "<div>";
                    echo "<h2>" . $auction['title'] . "</h2>";
                    echo "<br>";
                    echo "<img class=\"photo\" src=\"" . $auction['image_href'] . "\" alt=\"Image de l'annonce\">";
                    echo "<p>Prix de départ : " . $auction['reserve_price'] . "</p>";
                    echo "<p>Marque : " . $auction['brand'] . "</p>";
                    echo "<p>Modèle: " . $auction['model'] . "</p>";
                    echo "<p>Puissance : " . $auction['hp'] . "</p>";
                    echo "<p>Description : " . $auction['description'] . "</p>";
                    echo "<br>";
                    echo "<p>Fin d'enchère : " . $auction['end_date'] . "</p>";
                    echo "</div>";
                    echo "</div>";

                }
                echo "</div>";
            } catch (PDOException $e) {
                // Gérer les erreurs de connexion à la bd
                echo "Une erreur s'est produite lors de la connexion à la base de données : " . $e->getMessage();
            }
            ?>

        </main>
    </div>
    <?php include 'Nav/footer.php'; ?>
</body>

</html>
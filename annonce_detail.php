<?php
include __DIR__ . '/Nav/menu.php';
require_once __DIR__ . '/Class/newCar.class.php';
include __DIR__ . '/Functions/AnnonceDetail.php';
require_once __DIR__ . '/Functions/Encherir.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/styleCardDetail.css" />
    <title>Best Bid's</title>

</head>

<body>
    <header>
        <?php
        $menu_liens = [
            '/BestBids/annonce_affiche.php' => 'Retour',
            '/BestBids/logout.php' => 'Déconnexion',
        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>

    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    try {
        try {
            $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
        } catch (Exception $e) {
            $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la db
        echo "Une erreur s'est produite lors de la connexion à la base de données. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
        die();
    }

    // Afficher loading
    echo "<div class=\"loading-overlay\">";
    echo "<div class=\"loading-spinner\"></div>";
    echo "</div>";

    // Cacher loading après un délai de 1200ms
    echo "<script>
        setTimeout(function() {
            document.querySelector('.loading-overlay').style.display = 'none';
        }, 1200);
    </script>";

    // Vérifier si l'identifiant de l'annonce est présent dans l'URL
    if (isset($_GET['id'])) {
        $id_auction = $_GET['id'];

        // Appeler la fonction Encherir avec l'identifiant de l'annonce
        Encherir($id_auction, $dbh);

        // Vérifier si la date limite est dépassée et afficher le nom du gagnant
        $query = $dbh->prepare('SELECT * FROM auctions WHERE id_auction = :id_auction');
        $query->execute(array(':id_auction' => $id_auction));
        $auction = $query->fetch(PDO::FETCH_ASSOC);

        if ($auction && strtotime(date("Y-m-d")) > strtotime($auction['end_date'])) {
            $newBid = new newBid($id_auction, "", "", "", 0);
            $winnerName = $newBid->getWinnerName($dbh);

            if (!empty($winnerName)) {
                echo "<p>Le gagnant de cette enchère est : " . $winnerName . "</p>";
            }
        }
    } else {
        echo "L'identifiant de l'annonce n'est pas spécifié dans l'URL.";
    }

    AnnonceDetail();
    ?>

    <footer>
        <?php include 'Nav/footer.php'; ?>
    </footer>
</body>

</html>
<?php
require_once __DIR__ . '/AnnonceDetail.php';
require_once __DIR__ . '/../Class/newBid.class.php';
require_once __DIR__ . '/../Class/newCar.class.php';

function Encherir($id_auction, $dbh)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Vérifier si l'utilisateur est déjà connecté
    if (!isset($_SESSION["newUser"])) {
        echo "Impossible d'enchérir, vous n'êtes pas connecté(e) !";
        return;
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

    // Vérifier si l'annonce existe
    $query = $dbh->prepare('SELECT * FROM auctions WHERE id_auction = :id_auction');
    $query->execute(array(':id_auction' => $id_auction));
    $auction = $query->fetch(PDO::FETCH_ASSOC);

    if (!$auction) {
        echo "L'annonce n'existe pas.";
        return;
    }

    // Création du formulaire pour enchérir
    echo "<form method='POST'>";
    echo "<div>";
    echo "<input type='hidden' name='id_auction' value='" . $id_auction . "'>";
    echo "<span>Votre enchère : <input type='number' name='amount'></span>";
    echo "<button type='submit'>Enchérir</button>";
    echo "</div>";
    echo "</form>";

    // Traitement du formulaire
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_auction = $_POST["id_auction"];
        $id_user = $_SESSION["newUser"]["id_user"];
        $amount = $_POST["amount"];

        // Enregistrement de l'enchère dans la table bids
        $newBid = new newBid($id_auction, $id_user, $amount, date("Y-m-d"), 0);
        $newBid->save($dbh);

        echo "Votre enchère est bien enregistrée !";
    }
}
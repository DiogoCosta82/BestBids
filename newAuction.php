<?php
require_once __DIR__ . '/Class/newAuction.class.php';
require_once __DIR__ . '/annonce.php';



try {
    // Connexion bd
    try {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
    } catch (Exception $e1) {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
    }
} catch (PDOException $e1) {
    // Gérer les erreurs de connexion à la bd
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Je récupère les informations et je crée l'instance 
    $car = new newAuction(
        $_POST["id_bid"],
        $_POST["auction_id"],
        $_POST["user_id"],
        $_POST["amount"],
        $_POST["bid_date"],
        $_POST["winner_bid"],
        $_POST["reserve_price"],

    );
}
if ($query->rowCount() > 0) {
    $newCar->save($dbh);
    echo "<script>alert('Le gagnant est $');</script>";
} else {
    echo "<script>alert('Votre enchère a bien été prise en compte!.');</script>";
}
echo "<script>setTimeout(function() {window.location.href = 'index.php';});</script>";

<?php
require_once __DIR__ . '/Class/newCar.class.php';
require_once __DIR__ . '/annonce.php';

try {
    // Connexion bd
    try {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
    } catch (Exception $e) {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
    }
} catch (PDOException $e) {
    // Gérer les erreurs de connexion à la bd
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
    die();
}


// POST sur formulaire Annonce
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Je récupère les informations et je crée l'instance 
    $car = new newCar(
        $_POST["title"],
        $_POST["image_href"],
        $_POST["reserve_price"],
        $_POST["brand"],
        $_POST["model"],
        $_POST["hp"],
        $_POST["year"],
        $_POST["color"],
        $_POST["doors"],
        $_POST["places"],
        $_POST["fuel"],
        $_POST["kms"],
        $_POST["description"],
        $_POST["created_date"],
        $_POST["updated_date"],
        $_POST["end_date"],
    );
}


try {
    //AJOUT d'une annonce - connexion avec la db
    $query = $dbh->prepare("INSERT INTO `auctions` (`title`, `image_href`, `reserve_price`, `brand`,`model`, `hp`, `year`, `color`, `doors`, `places`, `fuel`, `kms`, `description`, `creted_date`, `updated_date`, `end_date`) 
                            VALUES (:title, :image_href, :reserve_price, :brand, :model, :hp, :year, :color, :doors, :places, :fuel, :kms, description, NOW(), NOW(), :end_date)");
    $query->bindValue(":title", $_POST["title"]);
    $query->bindValue(":image_href", $_POST["image_href"]);
    $query->bindValue(":reserve_price", $_POST["reserve_price"]);
    $query->bindValue(":brand", $_POST["brand"]);
    $query->bindValue(":model", $_POST["model"]);
    $query->bindValue(":hp", $_POST["hp"]);
    $query->bindValue(":year", $_POST["year"]);
    $query->bindValue(":color", $_POST["color"]);
    $query->bindValue(":doors", $_POST["doors"]);
    $query->bindValue(":places", $_POST["places"]);
    $query->bindValue(":fuel", $_POST["fuel"]);
    $query->bindValue(":kms", $_POST["kms"]);
    $query->bindValue(":description", $_POST["description"]);
    $query->bindValue(":creted_date", $_POST["creted_date"]);
    $query->bindValue(":updated_date", $_POST["updated_date"]);
    $query->bindValue(":end_date", $_POST["end_date"]);
    $query->execute();

    $results = $query->fetchAll();

    echo "<script>alert('Votre annonce à été crée avec succès.');</script>";
    echo "<script>setTimeout(function() {window.location.href = 'index.php';});</script>";
} catch (PDOException $e) {
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
}

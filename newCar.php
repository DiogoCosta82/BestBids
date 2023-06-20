<?php
require_once __DIR__ . '/Class/newCar.class.php';
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
        $_POST["description"],
        $_POST["end_date"],
    );
}


try {

    // Vérifier si l'ID de l'utilisateur existe dans la table user
    $query = $dbh->prepare("SELECT * FROM user WHERE id_user = :user_id");
    $query->bindParam(":user_id", $user_id);
    $query->execute();

    if ($query->rowCount() > 0) {
        // L'ID de l'utilisateur existe dans la table user, on peut insérer l'annonce
        //AJOUT annonce - connexion db
        $query = $dbh->prepare("INSERT INTO `auctions` (`id_user`, `title`, `image_href`, `reserve_price`, `brand`,`model`, `hp`, `description`, `created_date`, `end_date`) 
                            VALUES (:user_id; :title, :image_href, :reserve_price, :brand, :model, :hp, description, NOW(), :end_date)");
        $query->bindValue(":title", $_POST["title"]);
        $query->bindValue(":image_href", $_POST["image_href"]);
        $query->bindValue(":reserve_price", $_POST["reserve_price"]);
        $query->bindValue(":brand", $_POST["brand"]);
        $query->bindValue(":model", $_POST["model"]);
        $query->bindValue(":hp", $_POST["hp"]);
        $query->bindValue(":description", $_POST["description"]);
        $query->bindValue(":end_date", $_POST["end_date"]);
        $query->execute();

        $results = $query->fetchAll();
        echo var_dump($results) . "<br>";
    } else {
    }
    echo "<script>alert('Votre annonce à été crée avec succès.');</script>";
    echo "<script>setTimeout(function() {window.location.href = 'annonce_affiche.php';});</script>";
} catch (PDOException $e1) {
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
}
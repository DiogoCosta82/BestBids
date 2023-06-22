<?php
require_once __DIR__ . '/Class/newUser.class.php';
require_once __DIR__ . '/inscription.php';


try {
    try {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
    } catch (Exception $e) {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
    }
} catch (PDOException $e) {
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
    die();
}

// POST sur formulaire inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Je récupère les informations et je crée l'instance 
    $user = new newUser(
        $_POST["last_name"],
        $_POST["first_name"],
        $_POST["email"],
        $_POST["password"],
    );
}

try {
    // AJOUT d'un USER - connexion avec la db
    $query = $dbh->prepare("INSERT INTO `user` (`last_name`, `first_name`,`email`,password, `created_date`) VALUES (:last_name, :first_name, :email, :password, NOW())");
    $query->bindValue(":last_name", $_POST["last_name"]);
    $query->bindValue(":first_name", $_POST["first_name"]);
    $query->bindValue(":email", $_POST["email"]);
    $query->bindValue(":password", $_POST["password"]);
    $query->execute();

    echo "<script>alert('La création du compte utilisateur a été effectuée avec succès.');</script>";
    echo "<script>setTimeout(function() {window.location.href = 'index.php';});</script>";
} catch (PDOException $e) {
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
}

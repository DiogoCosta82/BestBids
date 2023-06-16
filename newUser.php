<?php
require_once(__DIR__ . '/Class/newUser.class.php');
require_once(__DIR__ . '/inscription.php');

try {
    try {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
    } catch (Exception $e) {
        $bdh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
    }
} catch (PDOException $e) {
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
    die();
}


// POST sur formulaire compte
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Je récupère les informations et je crée l'instance 
    $user = new user(
        $_POST["last_name"],
        $_POST["first_name"], // Ajout du nom des clés correspondantes pour chaque propriété du compte
        $_POST["email"],
        $_POST["password"],
    );
}

try {
    // AJOUT d'un USER - connexion avec la database
    $query = $dbh->prepare("INSERT INTO `user` (`last_name`, `first_name`,`email`,password, `created_date`) VALUES (:last_name, :first_name, :email, :password, NOW())");
    $query->bindValue(":last_name", $_POST["last_name"]);
    $query->bindValue(":first_name", $_POST["first_name"]);
    $query->bindValue(":email", $_POST["email"]);
    $query->bindValue(":password", $_POST["password"]);
    $query->execute();

    $results = $query->fetchAll();

    echo "<br><p class= \"result\">La création du compte utilisateur a été effectuée avec succès.</p><br><br>"; // a voir pour utiliser une alertBox
    header("Location: annonce.class.php");
} catch (PDOException $e) {
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
}

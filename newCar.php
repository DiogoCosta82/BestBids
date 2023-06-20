<?php
require_once __DIR__ . '/Class/newCar.class.php';


session_start();
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

// Récupérer l'ID de l'utilisateur connecté
$id_user = $_SESSION["newUser"]["id_user"];

// Vérifier si le formulaire est soumis

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["newUser"])) {
    // Récupérer les données du formulaire
    $title = $_POST["title"];
    $imageHref = $_POST["image_href"];
    $reservePrice = $_POST["reserve_price"];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $hp = $_POST["hp"];
    $description = $_POST["description"];
    $end_date = date("Y-m-d", strtotime($_POST["end_date"]));
    var_dump($end_date);



    // Nouvel objet NewCar
    $newCar = new NewCar($id_user, $title, $imageHref, $reservePrice, $brand, $model, $hp, $description, $end_date);


    try {
        // On recupere l'id de l'utilisateur connecté
        $id_user = $_SESSION["newUser"]["id_user"];

        // Vérifier si l'ID de l'utilisateur existe dans la table user
        $query = $dbh->prepare("SELECT * FROM user WHERE id_user = :id_user");
        $query->bindParam(":id_user", $id_user);
        $query->execute();


        if ($query->rowCount() > 0) {
            $newCar->save($dbh);
            // Rediriger vers la page d'affichage de l'annonce
            header("Location: annonce_affiche.php");
        } else {
        }
        echo "<script>alert('Votre annonce à été crée avec succès.');</script>";
        echo "<script>setTimeout(function() {window.location.href = 'annonce_affiche.php';});</script>";
    } catch (PDOException $e) {
        echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
    }
}

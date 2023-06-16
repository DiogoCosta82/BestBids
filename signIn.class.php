<?php
require_once(__DIR__ . '/login.php');

// Fonction de LOGIN
function SignIn($email, $password)
{
    // Démarrage de session
    session_start();

    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION["user"])) {
        // Rediriger vers la page d'accueil
        header("Location: index.php");
        exit;
    }

    // Vérifier les informations de connexion
    try {
        // Établir une connexion à la base de données
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");

        // Préparer une requête pour récupérer l'utilisateur correspondant aux informations de connexion
        $query = $dbh->prepare('SELECT * FROM user WHERE `email` = :email AND `password` = :password');
        $query->execute(array(':email' => $email, ':password' => $password));

        // Récupérer les résultats de la requête
        $results = $query->fetch();

        if ($results) {
            // Stocker les données de l'utilisateur dans la session
            $_SESSION["user"] = $results;
            // Rediriger vers la page utilisateur connecté
            header("Location: annonces.php");
            exit;
        } else {
            // Rediriger vers la page de connexion avec un message d'erreur
            header("Location: login.php?error=1");
            exit;
        }
    } catch (PDOException $e) {
        // Afficher un message d'erreur en cas d'échec de la connexion à la base de données
        echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
        die();
    }
}

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Appeler la fonction Login avec les données de connexion
    SignIn($email, $password);
}

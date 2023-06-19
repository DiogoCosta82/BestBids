<?php

class LoginClass
{
  public static function login($email, $password)
  {
    // Vérifier si l'utilisateur est déjà connecté
    session_start();
    if (isset($_SESSION["user"])) {
      // Rediriger vers la page d'accueil
      header("Location: index.php");
      exit;
    }

    try {
      try {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
      } catch (Exception $e) {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
      }

      $query = $dbh->prepare('SELECT * FROM user WHERE `email` = :email AND `password` = :password');
      $query->execute(array(':email' => $email, ':password' => $password));
      $results = $query->fetch(); // Récupération des données

      if ($results) {
        // Stocker les données de l'utilisateur dans la session
        $_SESSION["user"] = $results;
        // Rediriger vers la page utilisateur connecté
        header("Location: index.php");
        exit;
      } else {
        // Rediriger vers la page de connexion avec un message d'erreur
        header("Location: login.php?error=1");
        exit;
      }
    } catch (PDOException $e) {
      echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
      die();
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  LoginClass::login($email, $password);
}

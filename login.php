<?php


// Fonction de LOGIN
function Login($email, $password)
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
    try {
      $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
    } catch (Exception $e) {
      $bdh = new PDO("mysql:dbname=best_bids;host=127.0.0.1;port=8889", "root", "root");
    }
    $query = $dbh->prepare('SELECT * FROM user WHERE `email` = :email AND `password` = :password');
    $query->execute(array(':email' => $email, ':password' => $password));
    $results = $query->fetch(); // Récupération des données

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
    echo "Une erreur s'est produite lors de la requête. Veuillez contacter l'administrateur du système. <br><br> Erreur : " . $e->getMessage();
    die();
  }
}

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les données du formulaire
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Appeler la fonction SignIn avec les données de connexion
  Login($email, $password);
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="Style/style.css" />
  <title>Best Bid's - Login</title>
</head>

<body>

  <header>
    <?php
    include __DIR__ . '/Nav/menu.php';

    $menu_liens = [
      ' /BestBids/index.php' => 'Accueil',

    ];

    afficher_menu("", $menu_liens);
    ?>
  </header>



  <form action="login.php" method="POST">

    <h2>Connexion</h2>

    <label class="labelLogin">Email :</label><br />
    <input name="email" type="texte"></input><br />
    <label class="labelLogin">Mot de passe :</label><br />
    <input name="password" type="password"></input>
    <button class="buttonLogin">valider</button>

  </form>
  <?php
  // Vérifier si un message d'erreur est présent dans l'URL
  if (isset($_GET["error"]) && $_GET["error"] == 1) {
    echo '<p class="error">Erreur lors de la connexion ! Veuillez vérifier vos informations !</p>';
  }
  ?>
  <footer>
    <?php include 'Nav/footer.php'; ?>
  </footer>
</body>

</html>
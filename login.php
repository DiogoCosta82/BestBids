<?php
require_once(__DIR__ . '/Class/login.class.php'); ?>


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
      '/BestBids/index.php' => 'Accueil',

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
  <br>
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
<?php
require_once __DIR__ . '/Class/login.class.php';
include __DIR__ . '/Nav/menu.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/login_style.css" />
    <title>Best Bid's - Login</title>
</head>

<body>
    <header>
        <?php
        $menu_liens = [
            '/BestBids/index.php' => 'Accueil',
            '/BestBids/inscription.php' => 'Inscription',
        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>
    <div class="container">
        <div class="card">
            <h2>Connexion</h2>
            <form action="login.php" method="POST">
                <label class="labelLogin">Email :</label>
                <input name="email" type="text" required><br />
                <label class="labelLogin">Mot de passe :</label>
                <input name="password" type="password" required><br />
                <br>
                <button class="buttonLogin">Valider</button>
            </form>

            <?php
            // Vérifier si un message d'erreur est présent dans l'URL
            if (isset($_GET["error"]) && $_GET["error"] == 1) {
                echo '<p class="error">Erreur lors de la connexion ! Veuillez vérifier vos informations !</p>';
            }
            ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <footer>
        <?php include 'Nav/footer.php'; ?>
    </footer>
</body>

</html>
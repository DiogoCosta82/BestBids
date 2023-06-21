<?php
include __DIR__ . '/Nav/menu.php';
include __DIR__ . '/Functions/AnnonceIndex.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/styleCard.css" />
    <title>Best Bid's</title>

</head>

<body>
    <header>
        <?php
        $menu_liens = [
            '/BestBids/inscription.php' => 'Inscription',
            '/BestBids/annonce.php' => 'Déposer Annonce',
            '/BestBids/login.php' => 'Connexion',
        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>
    <div>
        <?php
        // Afficher la roue loading
        echo "<div class=\"loading-overlay\">";
        echo "<div class=\"loading-spinner\"></div>";
        echo "</div>";
        ?>

        <script>
            // Cacher la roue après un délai de 2000ms
            setTimeout(function() {
                document.querySelector('.loading-overlay').style.display = 'none';
            }, 1200);
        </script>

        <?php
        AnnonceIndex()
        ?>

    </div>
    <footer>
        <?php include 'Nav/footer.php'; ?>
    </footer>
</body>

</html>
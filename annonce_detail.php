<?php
include __DIR__ . '/Nav/menu.php';
require_once __DIR__ . '/Class/newCar.class.php';
include __DIR__ . '/Functions/AnnonceDetail.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/styleCardDetail.css" />
    <title>Best Bid's</title>

</head>

<body>
    <header>
        <?php
        $menu_liens = [
            '/BestBids/annonce.php' => 'Déposer Annonce',
            '/BestBids/logout.php' => 'Déconnexion',
        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>

    <?php
    // Afficher loading
    echo "<div class=\"loading-overlay\">";
    echo "<div class=\"loading-spinner\"></div>";
    echo "</div>";
    ?>

    <script>
        // Cacher loading après un délai de 1200ms
        setTimeout(function() {
            document.querySelector('.loading-overlay').style.display = 'none';
        }, 1200);
    </script>
    <?php
    AnnonceDetail()
    ?>

    <footer>
        <?php include 'Nav/footer.php'; ?>
    </footer>
</body>
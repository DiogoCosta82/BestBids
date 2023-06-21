<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/creation_annonce.css" />
    <title>Best Bid's - Page annonces</title>
</head>

<body>
    <header>
        <?php
        include __DIR__ . '/Nav/menu.php';

        $menu_liens = [
            '/BestBids/index.php' => 'Accueil',
            '/BestBids/logout.php' => 'Déconnexion',
        ];

        afficher_menu("", $menu_liens);
        ?>
    </header>
    <?php

    require_once __DIR__ . '/../detail.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $myDetail = new Detail(


            $_POST["title"],
            $_POST["image_href"],
            $_POST["reserve_price"],
            $_POST["brand"],
            $_POST["model"],
            $_POST["hp"],
            $_POST["description"],
            $_POST["end_date"]

        );

        $myDetail->displayDetail();
    }
    ?>
    <footer>
        <?php include 'Nav/footer.php'; ?>
    </footer>
</body>

</html>
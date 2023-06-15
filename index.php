<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css" />
    <title>Best Bid's</title>

    <?php
    include __DIR__ . '/Nav/menu.php';


    $menu_liens = [
        '/php/Guichet/index.php' => 'Inscription',
        '/php/Guichet/indexCinema.php' => 'Connexion',
        '/php/Guichet/indexTheatre.php' => 'Déconnexion'
    ];

    afficher_menu("", $menu_liens);
    ?>

</head>

<body>


    <footer>
        <?php include 'Nav/footer.php'; ?>
    </footer>

</body>

</html>
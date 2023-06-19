<?php

function afficher_menu($nom, $liens)
{
    session_start(); // Démarrer la session

    echo "<nav class=\"nav1\">";
    echo "<div class=\"btnNav\">";
    echo "<img class=\"logo\" src=\"images/logo.jpg\"/>";

    foreach ($liens as $lien => $texte) {
        // Vérifier si l'utilisateur est connecté
        $estConnecte = isset($_SESSION["user"]);

        // Si le lien est pour la page de connexion et l'utilisateur est déjà connecté, afficher le bouton déconnexion
        if ($lien === "/BestBids/login.php" && $estConnecte) {
            echo "<form action=\"logout.php\" method=\"POST\">";
            echo "<button class=\"btn\" type=\"submit\">Déconnexion</button>";
            echo "</form>";
        }
        // Si le lien est pour la page de connexion et l'utilisateur n'est pas connecté, afficher le bouton inscription et connexion
        elseif ($lien === "/BestBids/login.php" && !$estConnecte) {
            echo "<button class=\"btn\"><a href=\"$lien\">Connexion</a></button>";
        } elseif ($lien === "/BestBids/inscription.php" && !$estConnecte) {
            echo "<button class=\"btn\"><a href=\"$lien\">Inscription</a></button>";
        } elseif ($lien === "/BestBids/inscription.php" && !$estConnecte) {
            echo "<button class=\"btn\"><a href=\"$lien\">Accueil</a></button>";
        } elseif ($lien === "/BestBids/index.php" && !$estConnecte) {
            echo "<button class=\"btn\"><a href=\"$lien\">Accueil</a></button>";
        }
        // Si l'utilisateur est connecté, afficher les autres liens du menu
        elseif ($lien === "/BestBids/annonce.php" && $estConnecte) {
            echo "<button class=\"btn\"><a href=\"$lien\">Déposer Annonce</a></button>";
        } elseif ($lien === "/BestBids/index.php" && $estConnecte) {
            echo "<button class=\"btn\"><a href=\"$lien\">Accueil</a></button>";
            echo "<button class=\"btn\"><a href=\"$lien\">Déposer Annonce</a></button>";
            echo "<button class=\"btn\" type=\"submit\">Déconnexion</button>";
        }
    }

    echo "</div>";
    echo "</nav>";
}

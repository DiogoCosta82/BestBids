<?php


function afficher_menu($nom, $liens)
{
    echo "<nav class = \"nav1\">";
    echo "<div class = \"btnNav\">";
    echo "<img class = \"logo\" src=\"images/logo.jpg\"/>";
    foreach ($liens as $lien => $texte) {

        echo "<button class = \"btn\"><a href=\"$lien\">$texte</a></button>";;
    }
    echo "</div>";
    echo "</nav>";
}

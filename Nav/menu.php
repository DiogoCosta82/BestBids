<?php


function afficher_menu($nom, $liens)
{
    echo "<nav class = \"nav\">";
    echo "<div class = \"div1\">";
    echo "<img class = \"logo\" src=\"images/logo.jpg\"/>";
    foreach ($liens as $lien => $texte) {
        echo "<div class = \"btnDiv\">";
        echo "<button class = \"btn\"><a href=\"$lien\">$texte</a></button>";
        echo "</div>";
    }
    echo "</div>";
    echo "</nav>";
}

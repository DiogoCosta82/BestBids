<?php

function afficher_footer($texte)
{
    echo "<div class = \"footer\">";
    echo "<div class = \"parag\">";
    echo "<p class = \"footerT\">$texte</p>";
    echo "</div>";
    echo "</div>";
}

afficher_footer(" © Copyright 2023 Best Bid's ");

<?php
session_start();
session_unset();
session_destroy();
header("location: index.php");
echo "Vous êtes bien déconnecté de votre session";

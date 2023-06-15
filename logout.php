<?php
session_start();
session_unset();
session_destroy();
header("location: login.php");
echo "Vous êtes bien déconnecté de votre session! ";

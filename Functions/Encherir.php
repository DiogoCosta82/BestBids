<?php
require_once(__DIR__ . '/Functions/AnnonceDetail.php');

// Fonction
function Encherir($amount) //UPDATE pour enchères
{

    // 1 - Vérifier si l'utilisateur est déjà connecté
    session_start();
    if (isset($_SESSION["newUser"])) {
        echo "Vous êtes bien connecté(e), vous pouvez enchérir !";
    } else {
        // Afficher un message d'erreur
        echo "Impossible d'enchérir, vous n'êtes pas connecté(e) !";
        return; // Fin
    }

    // 2 - PDO FETCH - pour récupérer le prix de départ et créer l'input
    try {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
        $query = $dbh->prepare('SELECT * FROM auctions WHERE reserve_price = :reserve_price ');
        $query->execute(array(':reserve_price' => $reservePrice));
        $reservePrice = $query->fetch();
        // var_dump($reservePrice);

        // 3- Création de l'INPUT pour enchère (amount sur DB table bids)
        echo "<div><li>Votre enchère : <input type='number' name='amount' ></input></li>
            <br>
            <button type='submit'>Enchérir</button>
            <br></div>";
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    // 3 - POST de l'INPUT selon le name 'amount'
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amount"])) {
        // Récupérer les données de formulaire
        $amount = $_POST["amount"];

        //PDO - INSERT - enregistrement du amount dans la table Bids
        $query = $dbh->prepare("INSERT INTO `bids` (`amount`)
        VALUES (:amount)");
        $query->bindValue(":amount", $_POST["amount"]);
        $query->execute();

        //PDO - UPDATE - changement du prix_depart dans le tableau auctions
        $query = $dbh->prepare("UPDATE `auctions` (`amount `)
        SET amount = $amount WHERE reserve_price = $reservePrice ");
        $query->bindValue(":amount", $_POST["amount"]);
        $query->execute();

        // On affiche un message de confirmation
        echo "Votre enchère est bien enregistrée !";
    }
}

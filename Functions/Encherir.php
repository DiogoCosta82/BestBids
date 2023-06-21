<?php
require_once __DIR__ . '/AnnonceDetail.php';

function Encherir($reserve_price)
{
    // 1 - Vérifier si l'utilisateur est déjà connecté

    if (!isset($_SESSION["newUser"])) {
        // Afficher un message d'erreur
        echo "Impossible d'enchérir, vous n'êtes pas connecté(e) !";
        return; // Fin
    }

    // 2 - PDO FETCH - pour récupérer le prix de départ et créer l'input
    try {
        $dbh = new PDO("mysql:dbname=best_bids;host=127.0.0.1", "root", "");
        $query = $dbh->prepare('SELECT * FROM auctions WHERE reserve_price = :reserve_price ');
        $query->bindParam(':reserve_price', $reserve_price);
        $query->execute();
        $reserve_price = $query->fetch();

        // 3- Création du formulaire pour enchérir
        echo "<form method='POST'>
            <div>
                <p>Votre enchère : <input type='number' name='amount'></p>
                <br>
                <button type='submit'>Enchérir</button>
            </div>
        </form>";
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    // 3 - POST de l'INPUT selon le name 'amount'
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amount"])) {
        // Récupérer les données de formulaire
        $amount = $_POST["amount"];

        //PDO - INSERT - enregistrement du amount dans la table Bids
        $query = $dbh->prepare("INSERT INTO `bids` (`amount`) VALUES (:amount)");
        $query->bindParam(":amount", $amount);
        $query->execute();

        //PDO - UPDATE - changement du prix_depart dans le tableau auctions
        $query = $dbh->prepare("UPDATE `auctions` SET amount = :amount WHERE reserve_price = :reserve_price");
        $query->bindParam(":amount", $amount);
        $query->bindParam(":reserve_price", $reserve_price["reserve_price"]);
        $query->execute();

        // On affiche un message de confirmation
        echo "Votre enchère est bien enregistrée !";
    }
}

<?php

/**
 * core/Database.class.php - Classe database
 */

/* Namespace */
namespace bestbids\Database;


/* Alias */
use PDO;

/**
 * Classe base de données
 */

abstract class Database
{
    //pour mac
    const ADDRESS = "mysql:dbname=boiler_plan;host=127.0.0.1;port=8889";
    const USER = "root";
    const PASSWORD = "root";

    //Pour Windows: const ADDRESS = "mysql:dbname=cbnc;host:localhost";
    //const USER = "root";
    //const PASSWORD = "";


    /**
     * Création d'un connexion à la base de données
     */
    public static function createDBConnection()
    {
        return new PDO(self::ADDRESS, self::USER, self::PASSWORD);
    }
}
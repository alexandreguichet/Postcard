<?php

namespace Database\Factories;

use PDO;

class Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    private static function connect()
    {
        try {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=postcard', 'root', '');
        } catch (PDOException $e) {
            print("Erreur !: " . $e->getMessage() . "<br/>");
            die();
        }

        return $pdo;
    }

    public static function execute($sql){
        $pdo = static::connect();
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }


}

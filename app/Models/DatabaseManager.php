<?php

namespace App\Models;

use PDO;

class DatabaseManager
{
    /**
     * Connect PDO to database
     *
     * @return PDO
     */
    private static function connect()
    {
        try {
            $pdo = new PDO('mysql:host='.env('DB_HOST').';dbname='.env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'));
        } catch (PDOException $e) {
            print("Erreur !: " . $e->getMessage() . "<br/>");
            die();
        }

        return $pdo;
    }

    public static function execute($sql, $data) {
        $pdo = self::connect();
        if(str_contains(strtolower($sql), 'insert')) {
            $pdo->prepare($sql)->execute($data);
        } elseif (str_contains(strtolower($sql), 'select')) {
            $statement = $pdo->prepare($sql);
            if($data) {
                $statement->execute($data);
            } else {
                $statement->execute();
            }
            return $statement->fetchAll();
        }
    }
}

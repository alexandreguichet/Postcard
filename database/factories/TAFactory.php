<?php

namespace Database\Factories;

class TAFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE tas
        (
            user_id 	INTEGER NOT NULL AUTO_INCREMENT,
            user_name	CHAR(20),
            email       CHAR(20),
            password    CHAR(100),
            PRIMARY KEY (user_id)
        );';

        static::execute($sql);
    }
}

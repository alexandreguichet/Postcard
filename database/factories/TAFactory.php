<?php

namespace Database\Factories;

class TAFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE tas
        (
            user_id 	INTEGER,
            user_name	CHAR(20),
            PRIMARY KEY (user_id)
        );';

        static::execute($sql);
    }
}

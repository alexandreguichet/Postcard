<?php

namespace Database\Factories;

class TAFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE tas
        (
            user_id 	INTEGER NOT NULL AUTO_INCREMENT,
            name	CHAR(20),
            email       CHAR(20),
            password    CHAR(100),
            PRIMARY KEY (user_id)
        );';

        static::execute($sql);
    }

    public static function seedTable()
    {
        $sql = 'INSERT INTO tas(
                    name,
                    email,
                    password)
                VALUES (
                    \'TA1\',
                    \'ta1@gmail.com\',
                    \'password\'
                 )';

        static::execute($sql);

        $sql = 'INSERT INTO tas(
                    name,
                    email,
                    password)
                VALUES (
                    \'Ta2\',
                    \'ta2@gmail.com\',
                    \'password\'
                 )';

        static::execute($sql);
    }
}

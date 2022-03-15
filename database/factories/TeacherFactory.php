<?php
namespace Database\Factories;

class TeacherFactory extends Factory {

    public static function createTable() {
        $sql = 'CREATE TABLE teachers
        (
            user_id 	INTEGER NOT NULL AUTO_INCREMENT,
            user_name	CHAR(20),
            title		CHAR(20),
            email       CHAR(20),
            password    CHAR(100),
            PRIMARY KEY (user_id)
        );';

        static::execute($sql);
    }

    public static function seedTable()
    {
        $sql = 'INSERT INTO teachers(
                    user_name,
                    title,
                    email,
                    password)
                VALUES (
                    \'Romain\',
                    \'P.Eng\',
                    \'romain@gmail.com\',
                    \'password\'
                 )';

        static::execute($sql);

        $sql = 'INSERT INTO teachers(
                    user_name,
                    title,
                    email,
                    password)
                VALUES (
                    \'Amy\',
                    \'Associate Professor\',
                    \'amy1@gmail.com\',
                    \'password\'
                 )';

        static::execute($sql);
    }
}

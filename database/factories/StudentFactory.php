<?php

namespace Database\Factories;

use App\Models\DatabaseManager;

class StudentFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE students
        (
            user_id		    INTEGER NOT NULL AUTO_INCREMENT,
            name		CHAR(20),
            student_number	INTEGER,
            email           CHAR(20),
            password        CHAR(100),
            PRIMARY KEY (user_id)
        );';

        static::execute($sql);
    }

    public static function seedTable() {
        $sql = 'INSERT INTO students(
                    name,
                    student_number,
                    email,
                    password)
                VALUES (
                    \'Bob\',
                    \'12345678\',
                    \'test@gmail.com\',
                    \'password\'
                 )';

        static::execute($sql);

        $sql = 'INSERT INTO students(
                    name,
                    student_number,
                    email,
                    password)
                VALUES (
                    \'Filipp\',
                    \'867453421\',
                    \'test1@gmail.com\',
                    \'password\'
                 )';

        static::execute($sql);
    }
}

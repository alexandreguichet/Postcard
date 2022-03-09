<?php

namespace Database\Factories;

class StudentFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE students
        (
            user_id		INTEGER,
            user_name		CHAR(20),
            student_number	INTEGER,
            PRIMARY KEY (user_id)
        );';

        static::execute($sql);
    }
}

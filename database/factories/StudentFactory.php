<?php

namespace Database\Factories;

class StudentFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE students
        (
            user_id		    INTEGER NOT NULL AUTO_INCREMENT,
            user_name		CHAR(20),
            student_number	INTEGER,
            email           CHAR(20),
            password        CHAR(100),
            PRIMARY KEY (user_id)
        );';

        static::execute($sql);
    }
}

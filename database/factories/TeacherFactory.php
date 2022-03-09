<?php
namespace Database\Factories;

class TeacherFactory extends Factory {

    public static function createTable() {
        $sql = 'CREATE TABLE teachers
        (
            user_id 	INTEGER,
            user_name	CHAR(20),
            title		CHAR(20),
            PRIMARY KEY (user_id)
        );';

        static::execute($sql);
    }
}

<?php

namespace Database\Factories;

class AssignmentFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE assignments
        (
            assignment_id			INTEGER UNIQUE NOT NULL AUTO_INCREMENT,
            term				    CHAR(6) NOT NULL,
            assignment_name 		CHAR(20),
            open_on				    DATE NOT NULL,
            close_on				DATE NOT NULL,
            assignment_description	CHAR(100),
            PRIMARY KEY (term, assignment_name)
        );';

        static::execute($sql);
    }
}

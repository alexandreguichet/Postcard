<?php

namespace Database\Factories;

class AssignmentFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE assignments
        (
            assignment_id			INTEGER UNIQUE NOT NULL AUTO_INCREMENT,
            term				    CHAR(10) NOT NULL,
            assignment_name 		CHAR(20),
            open_on				    DATE NOT NULL,
            close_on				DATE NOT NULL,
            description	CHAR(100),
            PRIMARY KEY (term, assignment_name)
        );';

        static::execute($sql);
    }

    public static function seedTable() {
        $sql = 'INSERT INTO assignments(
                        term,
                        assignment_name,
                        open_on,
                        close_on,
                        description)
                 VALUES (
                         \'W22T1\',
                         \'Assignment 1\',
                         \'2022-01-01\',
                         \'2023-01-01\',
                         \'Assignment 1\'
                 )';

        static::execute($sql);

        $sql = 'INSERT INTO assignments(
                        term,
                        assignment_name,
                        open_on,
                        close_on,
                        description)
                 VALUES (
                         \'W22T2\',
                         \'Assignment 2\',
                         \'2022-01-01\',
                         \'2023-01-01\',
                         \'Assignment 2\'
                 )';

        static::execute($sql);
    }
}

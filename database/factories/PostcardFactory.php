<?php

namespace Database\Factories;

class PostcardFactory extends Factory
{
    public static function createTable(){
        $sql = 'CREATE TABLE postcards
            (
                postcard_id 		INTEGER,
                student_id		INTEGER,
                assignment_id		INTEGER NOT NULL,
                postcard_created_on	DATE NOT NULL,
                picture_back		CHAR(100),
                picture_front		CHAR(100),
                description	CHAR(100),
                PRIMARY KEY (postcard_id));';

        static::execute($sql);
    }

    public static function alterTable(){
        $sql = 'ALTER TABLE postcards
                ADD FOREIGN KEY (student_id) REFERENCES students(user_id),
                ADD FOREIGN KEY (assignment_id) REFERENCES assignments(assignment_id);
                ';

        static::execute($sql);
    }
}

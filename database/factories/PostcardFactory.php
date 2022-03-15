<?php

namespace Database\Factories;

class PostcardFactory extends Factory
{
    public static function createTable(){
        $sql = 'CREATE TABLE postcards
            (
                postcard_id 		INTEGER NOT NULL AUTO_INCREMENT,
                user_id		        INTEGER,
                assignment_id		INTEGER NOT NULL,
                title               CHAR(25),
                description	        CHAR(100),
                picture_front		CHAR(100),
                picture_back		CHAR(100),
                created_at	        DATETIME NOT NULL,
                PRIMARY KEY (postcard_id)
            );';

        static::execute($sql);
    }

    public static function alterTable(){
        $sql = 'ALTER TABLE postcards
                ADD FOREIGN KEY (user_id) REFERENCES students(user_id),
                ADD FOREIGN KEY (assignment_id) REFERENCES assignments(assignment_id);
                ';

        static::execute($sql);
    }
}

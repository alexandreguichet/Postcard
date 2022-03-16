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
                description	        TEXT,
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

    public static function seedTable(){
        $sql = 'INSERT INTO postcards(
                    user_id,
                    assignment_id,
                    title,
                    description,
                    picture_front,
                    picture_back,
                    created_at)
                VALUES (
                    (SELECT user_id FROM students WHERE user_id = 1),
                    (SELECT assignment_id FROM assignments WHERE assignment_id = 1),
                    \'My Postcard #1\',
                    \'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\',
                    \'/images/picture_front.jpg\',
                    \'/images/picture_back.jpg\',
                    \''.date('Y-m-d H:i:s').'\'
                 )';

        static::execute($sql);

        $sql = 'INSERT INTO postcards(
                    user_id,
                    assignment_id,
                    title,
                    description,
                    picture_front,
                    picture_back,
                    created_at)
                VALUES (
                    (SELECT user_id FROM students WHERE user_id = 2),
                    (SELECT assignment_id FROM assignments WHERE assignment_id = 2),
                    \'My Postcard #2\',
                    \'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\',
                    \'/images/picture_front1.jpg\',
                    \'/images/picture_back1.jpg\',
                    \''.date('Y-m-d H:i:s').'\'
                 )';

        static::execute($sql);
    }
}

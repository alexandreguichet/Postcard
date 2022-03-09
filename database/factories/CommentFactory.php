<?php

namespace Database\Factories;

class CommentFactory extends Factory {

    public static function createTable(){
        $sql = 'CREATE TABLE comments
        (
            comment_id		INTEGER,
            teacher_id  		INTEGER,
            ta_id			INTEGER,
            student_id		INTEGER,
            postcard_id		INTEGER NOT NULL,
            comment_created_on	DATE NOT NULL,
            comment			CHAR(100),
            PRIMARY KEY (comment_id)
        );';

        static::execute($sql);
    }

    public static function alterTable(){
        $sql = 'ALTER TABLE comments
                ADD FOREIGN KEY (teacher_id) REFERENCES teachers(user_id) ON DELETE CASCADE,
                ADD FOREIGN KEY (ta_id) REFERENCES tas(user_id) ON DELETE CASCADE,
                ADD FOREIGN KEY (student_id) REFERENCES students(user_id) ON DELETE CASCADE,
                ADD FOREIGN KEY (postcard_id) REFERENCES postcards(postcard_id) ON DELETE CASCADE;
                ';

        static::execute($sql);
    }
}

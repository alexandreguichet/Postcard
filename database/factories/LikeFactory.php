<?php
namespace Database\Factories;

class LikeFactory extends Factory {

    public static function createTable() {
        $sql = 'CREATE TABLE likes
        (
            like_id			INTEGER,
            teacher_id  	INTEGER,
            ta_id			INTEGER,
            student_id		INTEGER,
            postcard_id		INTEGER,
            PRIMARY KEY (teacher_id, ta_id, student_id, postcard_id)
        );';

        static::execute($sql);
    }

    public static function alterTable() {
        $sql = 'ALTER TABLE likes
                ADD FOREIGN KEY (teacher_id) REFERENCES teachers(user_id),
                ADD FOREIGN KEY (ta_id) REFERENCES tas(user_id),
                ADD FOREIGN KEY (student_id) REFERENCES students(user_id),
                ADD FOREIGN KEY (postcard_id) REFERENCES postcards(postcard_id) ON DELETE CASCADE;
                ';

        static::execute($sql);
    }
}

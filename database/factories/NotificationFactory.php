<?php

namespace Database\Factories;

class NotificationFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE notifications
        (
            notification_id			INTEGER,
            teacher_id  			INTEGER,
            ta_id				    INTEGER,
            student_id			    INTEGER,
            postcard_id			    INTEGER NOT NULL,
            notification_created_on	DATE NOT NULL,
            excerpt				    CHAR(100),
            `read`				    BIT,
            PRIMARY KEY (postcard_id, student_id, teacher_id, ta_id)
        );';

        static::execute($sql);
    }

    public static function alterTable() {
        $sql = 'ALTER TABLE notifications
                ADD FOREIGN KEY (teacher_id) REFERENCES teachers(user_id) ON DELETE CASCADE,
                ADD FOREIGN KEY (ta_id) REFERENCES tas(user_id) ON DELETE CASCADE,
                ADD FOREIGN KEY (student_id) REFERENCES students(user_id) ON DELETE CASCADE,
                ADD FOREIGN KEY (postcard_id) REFERENCES postcards(postcard_id) ON DELETE CASCADE
                ';

        static::execute($sql);
    }
}

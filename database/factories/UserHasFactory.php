<?php

namespace Database\Factories;

class UserHasFactory extends Factory
{
    public static function createTable() {
        $sql = 'CREATE TABLE userhas
        (
            user_id		INTEGER,
            user_name	CHAR(20),
            group_id	INTEGER,
            PRIMARY KEY (user_id, user_name)
        );';

        static::execute($sql);
    }

    public static function alterTable() {
        $sql = 'ALTER TABLE userhas
                ADD FOREIGN KEY (group_id) REFERENCES `groups`(group_id) ON DELETE CASCADE
                ';

        static::execute($sql);
    }
}

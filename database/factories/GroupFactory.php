<?php

namespace Database\Factories;

class GroupFactory extends Factory
{
    public static function createTable(){
        $sql = 'CREATE TABLE `groups`
        (
            group_id			INTEGER,
            group_name		CHAR(20),
            group_description	CHAR(100),
            PRIMARY KEY (group_id)
        );';

        static::execute($sql);
    }
}

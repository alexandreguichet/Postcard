<?php

namespace App\Models;

class Postcard extends Entity
{
    public string|null $title = null;
    public string|null $description = null;
    public string|null $picture_front = null;
    public string|null $picture_back = null;
    public int|null $assignment_id = null;
    public int|null $user_id = null;
    public string|null $created_at = null;

    public Student|null $user = null;
    public Assignment|null $assignment = null;

    public function __construct(array|null $data) {
        if($data) {
            $this->title = $data['title'];
            $this->description = $data['description'];
            $this->picture_front = $data['picture_front'];
            $this->picture_back = $data['picture_back'];
            $this->assignment_id = $data['assignment_id'];
            $this->user_id = $data['user_id'];
            $this->created_at = $data['created_at'];
        }
    }

    public static function index($data) {
        $sql = 'SELECT * FROM postcards WHERE ';
        foreach($data as $key => $value){
            $sql .= $key.' = :'.strtolower($key);
            if($value != end($data)){
                $sql .= ' AND ';
            }
        }

        return DatabaseManager::execute($sql, $data);
    }

    public static function new($data){
        $sql = 'INSERT INTO postcards(
                      user_id,
                      assignment_id,
                      title,
                      description,
                      picture_front,
                      picture_back,
                      created_at)
               VALUES ((SELECT user_id FROM students WHERE user_id = :user_id),
                       (SELECT assignment_id FROM assignments WHERE assignment_id = :assignment_id),
                       :title,
                       :description,
                       :picture_front,
                       :picture_back,
                       :created_at)';

        DatabaseManager::execute($sql, $data);
        return Postcard::first($data);
    }


    static function fetchAll(){
        $sql = 'SELECT * FROM postcards ORDER BY created_at desc';
        return DatabaseManager::execute($sql);
    }

    public function with(): static {
        $sql = 'SELECT * FROM students WHERE user_id = :user_id';
        $this->user = new Student(DatabaseManager::execute($sql, ['user_id' => $this->user_id])[0]);

        $sql = 'SELECT * FROM assignments WHERE assignment_id = :assignment_id';
        $this->assignment = new Assignment(DatabaseManager::execute($sql, ['assignment_id' => $this->assignment_id])[0]);
        return $this;
    }
}

<?php

namespace App\Models;

use App\Models\DatabaseManager;

class Postcard extends Entity
{
    public string|null $title = null;
    public string|null $description = null;
    public string|null $picture_front = null;
    public string|null $picture_back = null;
    public int|null $assignment_id = null;
    public int|null $user_id = null;
    public string|null $created_at = null;

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
        return Postcard::getFirst($data);
    }


    static function all(){
        $sql = 'SELECT * FROM postcards';
        return DatabaseManager::execute($sql);
    }
}

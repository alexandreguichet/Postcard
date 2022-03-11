<?php

namespace App\Models;

use App\Models\DatabaseManager;

class Postcard extends Entity
{
    public string $title;
    public string $description;
    public string $picture_front;
    public string $picture_back;
    public int $assignment_id;
    public int $user_id;
    public string $created_at;

    public function __construct($data) {
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->picture_front = $data['picture_front'];
        $this->picture_back = $data['picture_back'];
        $this->assignment_id = $data['assignment_id'];
        $this->user_id = $data['user_id'];
        $this->created_at = $data['created_at'];
    }

    public function new(){
        $sql = 'INSERT INTO postcards(
                      title,
                      description,
                      picture_front,
                      picture_back,
                      assignment_id,
                      user_id,
                      created_at)
               VALUES (:title,
                       :description,
                       :picture_front,
                       :picture_back,
                       (SELECT assignment_id FROM assignments WHERE assignment_id = :assignment_id),
                       (SELECT user_id FROM students WHERE user_id = :user_id),
                       :created_at)';

        DatabaseManager::execute($sql, (array) $this);
    }


}

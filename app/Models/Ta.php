<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ta extends Entity
{
    public int|null $user_id = null;
    public string|null $name = null;
    public string|null $email = null;
    public string|null $password = null;

    public function __construct($data)
    {
        if($data) {
            $this->user_id = $data['user_id'];
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->password = $data['password'];
        }
    }

    static function index($data)
    {
        $sql = 'SELECT * FROM tas WHERE ';
        foreach($data as $key => $value){
            $sql .= $key.' = :'.strtolower($key);
            if($value != end($data)){
                $sql .= ' AND ';
            }
        }

        return DatabaseManager::execute($sql, $data);
    }

    static function fetchAll(){
        $sql = 'SELECT * FROM tas';
        return DatabaseManager::execute($sql);
    }

    static function new($data): Entity
    {
        $sql = 'INSERT INTO tas(
                      name,
                      email,
                      password)
               VALUES (:name,
                       :email,
                       :password)';

        DatabaseManager::execute($sql, $data);
        return Ta::getFirst($data);
    }

    public function with(): static
    {
        return $this;
    }
}

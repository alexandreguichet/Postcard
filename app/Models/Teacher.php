<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class teacher extends Entity
{
    public int|null $user_id = null;
    public string|null $user_name = null;
    public string|null $title = null;
    public string|null $email = null;
    public string|null $password = null;

    public function __construct($data)
    {
        if($data) {
            $this->user_id = $data['user_id'];
            $this->user_name = $data['user_name'];
            $this->title = $data['title'];
            $this->email = $data['email'];
            $this->password = $data['password'];
        }
    }

    static function index($data)
    {
        $sql = 'SELECT * FROM students ';
        foreach($data as $key => $value){
            $sql .= $key.' = :'.strtolower($key);
            if($value != end($array)){
                $sql .= ' AND ';
            }
        }

        return DatabaseManager::execute($sql, $data);
    }

    static function all(){
        $sql = 'SELECT * FROM students';
        return DatabaseManager::execute($sql);
    }

    function new()
    {
        // TODO: Implement new() method.
    }
}

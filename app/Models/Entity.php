<?php

namespace App\Models;

abstract class Entity
{
    public static function create($data): Entity
    {
        $entity = new static($data);
        $entity->new();
        return $entity;
    }

    abstract function new();
}

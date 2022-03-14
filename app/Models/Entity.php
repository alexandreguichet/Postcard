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

    public static function get($data)
    {
        $array = static::index($data);
        foreach($array as $entity) {
            $entities[] = new static($entity);
        }
        return $entities; //returns a list of entity
    }

    public static function getAll($data)
    {
        $array = static::all();
        foreach($array as $entity) {
            $entities[] = new static($entity);
        }
        return $entities;
    }

    public static function getFirst($data): Entity
    {
        $array = static::index($data);
        $entity = new static($array[0]);
        return $entity;
    }

    abstract function new();
    abstract static function index($data);
    abstract static function all();
}

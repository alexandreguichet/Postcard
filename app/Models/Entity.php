<?php

namespace App\Models;

abstract class Entity
{
    public static function create($data): Entity
    {
        $entity = static::new($data);
        return $entity;
    }

    public static function get($data): array
    {
        $array = static::index($data);
        foreach($array as $entry) {
            $entity = new static($entry);
            $entities[] = $entity->with();
        }
        return $entities; //returns a list of entity
    }

    public static function all(): array
    {
        $array = static::fetchAll();
        foreach($array as $entry) {
            $entity = new static($entry);
            $entities[] = $entity->with();
        }
        return $entities;
    }

    public static function first($data): Entity
    {
        $array = static::index($data);
        $entity = new static($array[0]);
        $entity = $entity->with();
        return $entity;
    }

    abstract public function with(): static;
    abstract static function new($data);
    abstract static function index($data);
    protected abstract static function fetchAll();
}

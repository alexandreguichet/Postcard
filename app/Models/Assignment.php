<?php

namespace App\Models;

class Assignment extends Entity
{
    public int|null $assignment_id = null;
    public string|null $term = null;
    public string|null $name = null;
    public string|null $description = null;
    public string|null $open_on = null;
    public string|null $close_on = null;

    public function __construct($data = null){
        if($data){
            $this->assignment_id = $data['assignment_id'];
            $this->term = $data['term'];
            $this->name = $data['name'];
            $this->description = $data['description'];
            $this->open_on = $data['open_on'];
            $this->close_on = $data['close_on'];
        }
    }

    /**
     * @return $this
     */
    public function with(): static
    {
        return $this;
    }

    /**
     * @param $data
     * @return mixed
     */
    static function new($data)
    {
        $sql = 'INSERT INTO assignments(
                        term,
                        name,
                        description,
                        open_on,
                        close_on
                )VALUES(
                        :term,
                        :name,
                        :description,
                        :open_on,
                        :close_on
                )';

        DatabaseManager::execute($sql, $data);
        return Assignment::first($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    static function index($data)
    {
        // TODO: Implement index() method.
    }

    /**
     * @return mixed
     */
    protected static function fetchAll()
    {
        $sql = 'SELECT * FROM assignments';
        return DatabaseManager::execute($sql);
    }
}

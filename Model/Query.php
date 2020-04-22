<?php

namespace Model;

use Model\Model;

class Query extends Model
{

    /**
     * Récupérer many|null objets de la Db
     *
     * @return array| null
     */
    public function findAll()
    {
        return $this->query('SELECT * FROM ' . $this->model , false);
    }

    public function find($id)
    {
        return $this->query('SELECT * FROM ' . $this->model . ' WHERE id=' . $id);
    }
}
<?php

namespace Core\Model;

use Core\Model\Model;

class Query extends Model
{

    /**
     * Récupérer many|null objets de la Db
     *
     * @return array| null
     */
    public function findAll($order = ["id" => 'ASC'])
    {
        return $this->query('SELECT * FROM ' . $this->model . $this->createOrder($order), false);
    }

    public function find($id)
    {
        return $this->query('SELECT * FROM ' . $this->model . ' WHERE id=' . $id
                            , true);
    }

    public function findOneBy($criteria = [])
    {
        return $this->query('SELECT * FROM '. $this->model .
                                $this->createWhere($criteria)
                                , true);
    }

    public function findBy($criteria = [], $order = ["id" => 'ASC'])
    {
        return $this->query('SELECT * FROM '. $this->model .
                                $this->createWhere($criteria)
                                . $this->createOrder($order)
                                , false);
    }

}
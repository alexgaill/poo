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
    public function findAll($order = ["id" => 'ASC'])
    {
        return $this->query('SELECT * FROM ' . $this->model . $this->createOrder($order), false);
    }

    public function find($id, $order = ["id" => 'ASC'])
    {
        return $this->query('SELECT * FROM ' . $this->model . ' WHERE id=' . $id
                            . $this->createOrder($order)
                            , true);
    }

    public function findOneBy($id, $criteria = [], $order = ["id" => 'ASC'])
    {
        return $this->query('SELECT * FROM '. $this->model .
                                $this->createWhere($criteria)
                                . $this->createOrder($order)
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
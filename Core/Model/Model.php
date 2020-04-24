<?php

namespace Core\Model;

use Core\Database\Database;

class Model extends Database{

    protected $model;

    public function __construct()
    {
        if(is_null($this->model)){
            $class = explode('\\', get_class($this));
            $class = end($class);
            $this->model = strtolower(str_replace('Model', "", $class));
        }

        parent::__construct();
    }

    public function query($statement, $one = false){
        $query = $this->pdo->query($statement, \PDO::FETCH_OBJ);

        if($one){
            return $query->fetch();
        } else {
            return $query->fetchAll();
        }
    }

    public function prepare ($statement, $data)
    {
        $prepare = $this->pdo->prepare($statement);
        $prepare->execute($data);

    }

    public function exec ($statement)
    {
        return $this->pdo->exec($statement);
    }

    public function createWhere($criteria)
    {
        $where = ' WHERE ';
        foreach ($criteria as $key => $value) {
            $where .= $key . ' = "' . $value . '" AND ';
        }
        return substr($where, 0, -4);
    }

    public function createOrder ($order)
    {
        $orderList = ' ORDER BY ';
        foreach ($order as $key => $value) {
            $orderList .= $key . ' ' . $value . ', ';
        }
        return substr($orderList, 0, -2);
    }
}
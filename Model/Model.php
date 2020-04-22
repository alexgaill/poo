<?php

namespace Model;

use Database\Database;

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

    public function saveBien($data)
    {
        $verifyData = [];
        foreach ($data as $key => $value) {
            $key = ":" . $key;
            $value = htmlspecialchars($value);
            $verifyData[$key] = $value;
        }
        $prepare = $this->pdo->prepare("INSERT INTO property (title, address, postalCode, surface, type, floor) VALUES (:title, :address, :postalCode, :surface, :type, :floor)");
        $prepare->execute($verifyData);
    }

    public function modifyBien($data){

        $statement = "UPDATE property SET ";

        foreach ($data as $key => $value) {
            $statement .= $key . "= '" . $value . "', ";
        }
        $statement = substr($statement, 0, -13);
        $statement .= " WHERE id=". $_GET["id"];

        // return $statement;
        $this->pdo->exec($statement);
        // $prepare->execute($statement);
    }

    public function deleteBien($id){
        $this->pdo->exec("DELETE FROM property WHERE id=" . $id);
    }
}
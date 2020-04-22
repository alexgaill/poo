<?php

namespace Model;

use Database\Database;

class Model extends Database{

    public function getBiens()
    {
        $result = $this->pdo->query("SELECT * FROM property", \PDO::FETCH_OBJ);
        return $result->fetchAll();
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

    public function getBien ($id)
    {
        $result = $this->pdo->query("SELECT * FROM property WHERE id=" . $id, \PDO::FETCH_OBJ);
        return $result->fetch();
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
}
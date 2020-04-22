<?php

namespace Model;

use Model\Model;

class DbInterface extends Model
{
    public function save($data, $class){

        $statement = 'INSERT INTO ' . $class . '(';

        foreach ($data as $key => $value){
            $statement .= $key . ', ';
        }
        $statement = substr($statement, 0, -2) . ') VALUES ( ';

        foreach ($data as $key => $value) {
            $statement .= ':' . $key . ', ';
        }
        $statement = substr($statement, 0, -2) . ')';

        foreach ($data as $key => $value) {
            $key = ':' . $key;
            $value = htmlspecialchars($value);
        }
        $this->prepare($statement, $data);
    }

    public function update($class, $data, $id){

        $statement = "UPDATE " . $class . " SET ";

        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $statement .= $key . ' = "' . $value . '", ';
            } elseif (empty($value)){
                $statement .= $key . " = NULL" ;
            }
        }
        $statement = substr($statement, 0, -2);
        $statement .= ' WHERE id=' . $id;

        $this->exec($statement);
    }
    public function delete($class, $id){
        $this->exec('DELETE FROM ' . $class . ' WHERE id=' . $id);
    }
}
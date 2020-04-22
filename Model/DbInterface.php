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
}
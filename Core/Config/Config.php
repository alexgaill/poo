<?php

namespace Core\Config;

class Config
{

    public function __construct(){
        $this->config = [
            'dbHost' => '127.0.0.1',
            'dbPort' => '8889',
            'dbName' => 'immobilier',
            'dbUser' =>  'root',
            'dbPassword' => 'root'
        ];
    }

    public function getConfig(){
        return $this->config;
    }
    
}
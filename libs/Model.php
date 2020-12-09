<?php

namespace APIRest\libs;

class Model {

    protected $db;
    protected $error;

    public function __construct() {
        global $config;
        try {
            $this->db    = new MySQL($config['server'], $config['port'], $config['dbName'], $config['user'], $config['pass']);
            $this->error = null;
        } catch(\MySQLException $x_X){
            $this->error = $x_X->getMessage();
        }
        
    }
}
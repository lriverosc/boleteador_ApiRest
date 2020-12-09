<?php

namespace APIRest\models;

use APIRest\libs\Model;
use APIRest\libs\Utils as Util;

class IngresoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function post(array $params = [], array $options = []){
        $data = file_get_contents("php://input");
        $result = json_decode($data, true);
        if(isset($result['usuario']) && isset($result['clave'])){
            //Recibimos el usuario
            $user = $result['usuario'];
            //Recibimios la clave
            $pass = $result['clave'];
            $sql = "SELECT * FROM ingreso WHERE rut = $user AND cadena = '$pass'";
            $exists = $this->db->execute($sql);
            return $this->db->numRows() > 0;        
        }
        
    }
}
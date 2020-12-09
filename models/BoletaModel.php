<?php

namespace APIRest\models;

use APIRest\libs\Model;
use APIRest\libs\Utils as Util;

class BoletaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(array $params = [], array $options = []){
        $result = array();
        switch(count($params)){
            case 0:
                $sql = "SELECT * FROM boleta;";
                $result = $this->db->execute($sql);
            break;
            case 2:
                if(is_numeric($params[1])){
                    $sql = "SELECT * FROM boleta WHERE id_boleta = ".$params[1];
                    $result = $this->db->execute($sql);
                } else {
                    Util::JSONResponse(Util::encodeResponse(400, [], "El identificador debe ser ser numerico"));
                    exit;
                }    
            break;
        }
        return $result;
    }

    public function post(){
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        if(isset($data['rut']) && isset($data['folio']) && isset($data['fecha']) && isset($data['monto'])){
            $now = date("Y-m-d");
            $sql = "INSERT INTO boleta VALUES (NULL, {$data['rut']}, {$data['folio']}, {$data['fecha']}, {$data['monto']}, '$now', NULL);";
            $lid = $this->db->execute($sql);
            return is_numeric($lid) && $lid > 0;
        } else {
            return false;
        }
    }
 
    

    public function put()
    {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        if (isset($data['id_boleta']) && isset($data['rut']) && isset($data['folio'])&& isset($data['fecha']) && isset($data['monto'])) {
            $sql = "UPDATE boleta SET folio = {$data['folio']}, rut = {$data['rut']}, fecha = {$data['fecha']}, monto = {$data['monto']} WHERE id_boleta = {$data['id_boleta']};";
            $lid = $this->db->execute($sql);
            return is_numeric($lid) && $lid > 0;
        } else {
            return false;
        }
    }

    //creacion del endpoint PATCH
    public function patch()
    {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        if (isset($data['id_boleta'])) {
            $sql = "UPDATE boleta SET ";
            $sql .= isset($data['rut']) ? "rut = " . $data['rut'] . ", " : "";
            $sql .= isset($data['folio']) ? "folio = " . $data['folio'] . ", " : "";
            $sql .= isset($data['fecha']) ? "fecha = " . $data['fecha'] . ", " : "";
            $sql .= isset($data['monto']) ? "monto = " . $data['monto'] . ", " : "";
            $sql .= isset($data['fecha_baja']) ? "fecha_baja = " . $data['fecha_baja'] . ", " : "";
            $sql = substr($sql, 0, strlen($sql) - 2);
            $sql .= " WHERE id_boleta = " . $data['id_boleta'];
            $lid = $this->db->execute($sql);
            return is_numeric($lid) && $lid > 0;
        } else {
            return false;
        }
    }
}

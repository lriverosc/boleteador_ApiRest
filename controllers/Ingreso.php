<?php

namespace APIRest\controllers;

use APIRest\libs\Controller;
use APIRest\libs\Utils as Util;
use APIRest\models\IngresoModel;

class IngresoController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model = new IngresoModel();
    }

    public function start(){
        $this->isAllow(array("POST"));
        $arguments = count($this->parameters) > 0 ? $this->parameters : [];
        switch($this->HTTPMethod) {
            case "POST": 
                $result = $this->model->post($arguments);
                $code = $result ? 200 : 404;
                Util::JSONResponse(Util::encodeResponse($code, []));
            break;
            default:
                Util::JSONResponse(Util::encodeResponse(404, [], "Metodo de solicitud no permitido {$this->HTTPMethod}"));
                exit;
        }
    }

}
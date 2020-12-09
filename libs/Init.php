<?php

namespace APIRest\libs;

use APIRest\libs\Utils as Util;

class Init {

    private $controllerName;
    private $controller;
    private $parameters;

    public function start(){
        $this->loadFiles();
        $this->getParameters();
        $this->loadController();
    }

    /**
     * Carga los archivos necesarios para el funcionamiento del sistema
     *
     * @return void
     */
    private function loadFiles() {
        //Capturamos la ubicación de las carpetas de controladores y modelos
        $dirControllers = dirname(__FILE__)."/../controllers/";
        $dirModels = dirname(__FILE__)."/../models/";

        //Escaneamos los archivos dentro de los directorios anteriores
        $controllers = scandir($dirControllers);
        $models = scandir($dirModels);

        //Incorporamos al sistema uno a uno los controladores
        foreach($controllers as $controller) {
            $file = $dirControllers.$controller;
            if(is_file($file)){
                include_once $file;
            }
        }

        //Incorporamos al sistema uno a uno los modelos
        foreach($models as $model) {
            $file = $dirModels.$model;
            if(is_file($file)){
                include_once $file;
            }
        }
    }

    /**
     * Obtiene los parametros entregados por URL para el procesamiento de datos
     *
     * @return void
     */
    private function getParameters(){
        $destiny = filter_var(rtrim(isset($_GET['destiny']) ? $_GET['destiny'] : null, "/"), FILTER_SANITIZE_URL);
        $destiny = explode('/', ucwords($destiny));
        $endpoint = str_replace("/","", $destiny[0]);
        $this->parameters = $destiny;
        $this->controllerName = !empty($endpoint) ? "APIRest\\controllers\\".$destiny[0]."Controller" : null;
    
    }
    
    private function loadController(){
        if(!empty($this->controllerName)){
            if(class_exists($this->controllerName)){
                $this->controller = new $this->controllerName;
                if(count($this->parameters) == 1){
                    if(method_exists($this->controller, "start")){
                        $this->controller->start();
                    }
                } else {
                    $this->controller->parameters = count($this->parameters) > 0 ? $this->parameters : array();
                    $this->controller->start();
                }
                
            } else {
                Util::JSONResponse(Util::encodeResponse(404, [], "Endpoint requerido no existe"));
                exit;
            }
        } else {
            echo "Bienvenido. El API Rest está en funcionamiento";
        }
    }
}
<?php

$autoload = dirname(__FILE__)."\\autoload.php";
require_once $autoload;

$init = new APIRest\libs\Init;
$init->start();
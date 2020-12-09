<?php
$dirLibs = __DIR__."/libs/";
$files = scandir($dirLibs);
foreach($files as $file) {
    if(is_file($dirLibs.$file)){
        include_once $dirLibs.$file;
    }
}

<?php

spl_autoload_register(function ($classname) {

    $fullPath           = $classname . '.php';
    $fullModelPath      = APPROOT ."/Model/" . $classname . '.php';
    $fullControllerPath = APPROOT ."/Controller/" . $classname . '.php';
    $corePath           = APPROOT ."/Core/" . $classname . '.php';


    $fullPath = str_replace('\\', '/', $fullPath);

    if (file_exists($fullModelPath)) {
        include_once $fullModelPath;
    }
    if (file_exists($corePath)) {
        include_once $corePath;
    }

    if (file_exists($fullControllerPath)) {
        include_once $fullControllerPath;
    }

    if (file_exists($fullPath)) {
        include_once $fullPath;
    }


});
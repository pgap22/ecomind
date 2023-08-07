<?php
session_start();
require('./../includes/db.php');
require('./../includes/helper.php');

function autoload($a){
    $route = "./../" . $a . ".php";
    $controller = "./../controllers/". $a . ".php";
    $model = "./../models/". $a . ".php";

    if(file_exists($route)){
        require($route);
    }
    if(file_exists($controller)){
        require($controller);
    }
    if(file_exists($model)){
        require($model);
    }
}

spl_autoload_register('autoload');

ActiveRecord::setDB($db);

date_default_timezone_set("America/El_Salvador");
?>
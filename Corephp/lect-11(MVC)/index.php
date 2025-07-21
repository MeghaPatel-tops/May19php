<?php
session_start();
require('Model/Model.php');
require('Controller/Controller.php');

$Obj= new Controller();



if(isset($_SERVER['PATH_INFO'])){
     $path = $_SERVER['PATH_INFO'];

    if($path=="/about"){
        $Obj->about();
    }
    else if($path=="/home"){
        $Obj->home();
    }
    else if($path=="/usercreate"){
        include('View/Useradd.php');
    }
    else if($path=="/userstore"){
        $Obj->addUser();
    }
}



?>
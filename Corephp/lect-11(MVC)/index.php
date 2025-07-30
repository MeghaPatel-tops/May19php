<?php
session_start();
require('Model/Model.php');
require('Controller/Controller.php');

$Obj= new Controller();

$baseurl="http://localhost/May19php/Corephp/lect-11(MVC)/index.php/";



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
    else if($path == '/userview'){
        $Obj->viewUser();
    }
    else if($path == '/deleteuser'){
        $Obj->deleteUser();
    }
    else if($path == '/edituser'){
        $Obj->editUser();
    }
     else if($path == '/userupdate'){
        $Obj->userupdate();
    }
}



?>
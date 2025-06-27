<?php

function connectDb(){
    $fp = fopen("errorlog.text","a");
    try{
        $con = new mysqli("localhost","root","","etsdt");
        // if(!$con){
        //     throw new Exception("Database not found");
        // }
    }
    catch(Exception $error){
        echo $error->getMessage();
        fprintf($fp,"Error:".$error->getMessage()." ".date("d:m:Y h:i:s")."\n\n");
    }
}
connectDb();



?>
<?php
 class Model{
    public $con;
    
    public function __construct(){
        $this->con = new mysqli("localhost","root","","may19php");
        if(isset($this->con)){
            echo "success";
        }

    }
    
    public function test(){
            echo "test";
    }

 }



?>
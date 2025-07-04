<?php
     $connection = new mysqli ("localhost","root","","may19php");

     if(isset($_SERVER['PATH_INFO'])){
        $path = $_SERVER['PATH_INFO'];
        $pathName = explode("/",$path);
        $pathName = $pathName[1];

        if($pathName=="catdata"){
            $query= "select * from category";
            $req=$connection->query($query);
            while($row=$req->fetch_object()){
                $rw[]=$row;
            }
            //print_r($rw);
            echo json_encode($rw);
        }
        else if($pathName=='productdata'){
            if(isset($_REQUEST['cid']) && $_REQUEST['cid']!=0){
                $cid=$_REQUEST['cid'];
                $query= "select * from products where categoryId=$cid";

            }
            else{
                $query= "select * from products";
            }
                
            $req=$connection->query($query);
            while($row=$req->fetch_object()){
                $rw[]=$row;
            }
            //print_r($rw);
            echo json_encode($rw);
        }
     }

?>
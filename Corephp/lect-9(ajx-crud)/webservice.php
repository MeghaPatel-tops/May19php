<?php

    $connection = new mysqli("localhost","root","","may19php");

   if(isset($_SERVER['PATH_INFO'])){
       $path = $_SERVER['PATH_INFO'];


        //Add Users
       if($path == "/adduser"){
           $cnno=$_POST["cnno"];
           $pwd=$_POST["pwd"];
           $email=$_POST["email"];
           $uname=$_POST["uname"];
            $query = "insert into users(uname,email,password,contact)values('$uname','$email','$pwd','$cnno')";
            $result= $connection->query($query);
            if($result){
                echo json_encode(["status"=>200,"msg"=>"data successfully Inserted"]);
            }

       }
       

       //Get ALL Users method GET

       if($path=="/getusers"){
            $query= "select * from users";
            $req = $connection->query($query);
            while($row=$req->fetch_object()){
                $users[]=$row;
            }
            echo json_encode($users);
       }

   }


?>
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

       //For Delete user
       if($path=="/deluser"){
           $uid=$_POST['userid'];
           $query = "delete from users where uid=$uid";
           $result=$connection->query($query);
           if(isset($result)){
              echo "Data successfully Deleted";
           }
       }

       //Edit  user
       if($path == "/edituser"){
            $uid=$_GET['userid'];
            $query="select * from users where uid=$uid";
            $req=$connection->query($query);
            $user = $req->fetch_object();
            if($user){
                echo json_encode($user);
            }


       }

       //update user
       if($path=="/updateuser"){
            
           $cnno=$_POST["cnno"];
           $pwd=$_POST["pwd"];
           $email=$_POST["email"];
           $uname=$_POST["uname"];
           $uid = $_POST['uid'];

           $query ="update users set uname='$uname',email='$email',password='$pwd',contact='$cnno' where uid=$uid";

           $result=$connection->query($query);
           if($result){
                echo "Data successfully Update";
           }
       }

   }


?>
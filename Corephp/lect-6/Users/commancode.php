<?php
    include('../db.php');
   if(isset($_POST['register'])){
        $uname    =$_POST['uname'];
        $email    =$_POST['email'];
        $pass    =$_POST['pwd'];
        $contact   =$_POST['contact'];
        try{
              $user = "insert into users(uname,email,password,contact)values('$uname','$email','$pass','$contact')";

            $result = $connection->query($user);

            if($result){
              echo "<script>alert('User register Successfully');
                    window.location.href='login.php';
                    </script>";
            }
            else{
              echo "<script>alert('Something wrong')</script>";
            }
        }
        catch(Exception  $error){
            echo "<script>alert('User already Exits');
            window.location.href='register.php';</script>";
        }

   }

   //=================Login proccess====================
   if(isset($_POST['loginbtn'])){
      $email = $_POST['email']; 
      $pass= $_POST['pass'];
      $query ="SELECT * FROM `users` WHERE email ='$email' and password='$pass'";
      $req= $connection->query($query);
      $row = $req->fetch_object();
      // echo "<pre>";
      // print_r($row);
      if($row){
          $_SESSION['user']=$row;
          if(isset($_POST['check'])){
            setcookie('email',$email,time()+3600);
          setcookie('pass',$pass,time()+3600);
          }
           echo "<script>alert('User logged In Successfully');
                 window.location.href='index.php';
                 </script>";
        }
        else{
          echo "<script>alert('Login fail Enter Valid Email & password');
          window.location.href='login.php';
          </script>";
        }
   }


?>
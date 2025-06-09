<?php
    include('../db.php');
   if(isset($_POST['register'])){
        $uname    =$_POST['uname'];
        $email    =$_POST['email'];
        $pass    =$_POST['pwd'];
        $contact   =$_POST['contact'];
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


?>
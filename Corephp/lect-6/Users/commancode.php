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

   //====================Add to Cart========================
   if(isset($_REQUEST['cart']) && $_REQUEST['cart']==true){
         $pid=$_REQUEST['pid'];
         if(isset($_SESSION['user'])){
            $uid = $_SESSION['user']->uid;
             $query = "insert into cart(uid,pid)values($uid,$pid)";
             $result=$connection->query($query);
             if(isset($result)){
                echo "<script>alert('Product Added into cart');
                      window.location.href='index.php';
                      </script>";
             }
             else{
                echo "<script>alert('Something Wrong try again');
          window.location.href='index.php';
          </script>";
             }
             
         }
         else{
             echo "<script>alert('please Login First');
          window.location.href='login.php';
          </script>";
         }
   }

   //==================cart item qty remove==================
   if(isset($_REQUEST['cartremove'])){
      $cid = $_REQUEST['cartid'];
      $qty = $_REQUEST['qty'];
      if($qty <= 1){
          $query = "delete from cart where cid=$cid";
      }
      else{
        $newqty = $qty-1;
         $query = "update cart set qty= $newqty where cid=$cid";
      }
      $result = $connection->query($query);
      if(isset($result)){
         header("Location:usercart.php");
      }
   }

   //=================cart item qty add=================================
if(isset($_REQUEST['cartadd'])){
      $cid = $_REQUEST['cartid'];
      $qty = $_REQUEST['qty'];
     
        $newqty = $qty+1;
         $query = "update cart set qty= $newqty where cid=$cid";
    
      $result = $connection->query($query);
      if(isset($result)){
         header("Location:usercart.php");
      }
   }

?>
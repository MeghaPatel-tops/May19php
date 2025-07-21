<?php
class Controller extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function about(){
        include('View/about.php');
    }
     public function home(){
        include('View/home.php');
    }

    public function addUser(){
        if(isset($_POST['username'])){
            $username = $_REQUEST['username'];
            $email = $_REQUEST['email'];
            $pswd=$_REQUEST['pswd'];

            if( $username == ""){
                $_SESSION['msg'][0]="Username Requird";
                header("Location:usercreate");
                
            }
            else  if($email == ""){
                $_SESSION['msg'][1]="Email Requied";
                header("Location:usercreate");
            }
            else if($pswd == "" && strlen($pswd)<8){
                $_SESSION['msg'][2]="Password required minmum 8 char";
                header("Location:usercreate");
            }
            else{
                $userData = ['username'=>$username,"email"=>$email,"pswd"=>$pswd];
                print_r($userData);
            }
            
        }
    }
}

?>
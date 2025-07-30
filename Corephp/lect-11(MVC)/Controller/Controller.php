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
                $userData = ['username'=>$username,"email"=>$email,"password"=>$pswd];
                $res=$this->insertData("users",$userData);
                if($res){
                    header("Location:".$baseurl."userview");
                }
            }
            
        }
    }

    public function viewUser(){
        $userData=$this->selectAll("users");
        include('View/userview.php');
    }

    public function deleteUser(){
        echo $id=$_REQUEST['uid'];
        $result = $this->deleteData($id);
        if($id){
           header("Location:".$baseurl."userview");
        }
    }

    public function editUser(){
          $id=$_REQUEST['uid'];
         $result=$this->selectWhere("users",['id'=>$id]);
        $userData=$result[0];
        include('View/edituser.php');
    }

    public function userupdate(){
        if(isset($_POST['username'])){
            $username = $_REQUEST['username'];
            $email = $_REQUEST['email'];
            $pswd=$_REQUEST['pswd'];
            $id=$_REQUEST['uid'];

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
                $userData = ['username'=>$username,"email"=>$email,"password"=>$pswd];
                $res=$this->updateData("users",$userData,["id"=>$id]);
                if($res){
                    header("Location:".$baseurl."userview");
                }
              }
        }
    }
}

?>
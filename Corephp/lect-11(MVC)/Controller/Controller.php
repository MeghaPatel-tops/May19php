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
}

?>
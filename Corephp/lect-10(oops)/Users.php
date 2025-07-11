<?php

    class Users{
        //default constructor
        public function __construct($username="user1"){
            echo "constructor method called";
            echo "<br>".$username;
        }
    }


    $user1 = new Users("Ronak");


?>
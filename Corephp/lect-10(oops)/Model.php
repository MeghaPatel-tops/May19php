<?php
   class Connection{
        const MESSAGE = "<h1>Inheritance example</h1>";


        public function __construct(){
            echo "parent class contructor called";
        }
   }

   class Model extends Connection{
        public function __construct(){
            Parent::__construct();
            echo "child class method called";
        }
   }

   $m1 = new Model();
echo Model::MESSAGE;

?>
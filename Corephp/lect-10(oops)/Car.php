<?php
    class Car{
        public $carname,$brand,$model;

        public function __construct($cname,$bname,$model){
                $this->carname= $cname;
                $this->brand= $bname;
                $this->model = $model;
        }
        public function __destruct(){
            echo "<br>Memory clear";
        }
        public function display(){
            echo "<h1>$this->carname</h1>";
            echo "<h1>$this->brand</h1>";
            echo "<h1>$this->model</h1>";
        }
    }

    $c1 = new Car("Audi q7","Audi","Top 10");
    $c1->display();

    echo "<h1>Second Car</h1>";

    $c2= new Car("BMW 122","BMW","Tops");
    $c2->display();



?>
<?php

 class Maths{
    public function add($a,$b){
        echo "addition of two varible =".$a+$b;
    }

 }

 class Child extends Maths{
     public function add($x,$y){
        echo "addition of x and y=".$x+$y;
     }
 }

 $m1= new Child();
 $m1->add(12,34);
 

?>
<?php

 abstract class Maths{
    abstract public function add($a,$b);
    public function display(){
        echo "<br>Abstract class normal method called";
    }
 }

 class Child extends Maths{
     public function add($x,$y){
        echo "<br>addition of x and y=".$x+$y;
     }
 }

 $m1= new Child();
 $m1->add(12,34);
 $m1->display();
 

?>
<?php
 trait mathsExample{
    public function calc($a,$b){
        echo "<h1>add=$a+$b</h1>";
    }
 }

 trait stringExample{
    public function strRev($str){
        echo strrev($str);
    }
 }

 class Main{
    use mathsExample;
    use stringExample;
 }

 $m1 = new Main();
 $m1->calc(100,9900);
 $m1->strRev("tops");


?>
<?php

function incre(){
    $i=0;
    static $s=0;
    $i++;$s++;
    echo "<h1>i=$i and s=$s</h1>";
}

for($i=1;$i<=3 ;$i++){
    incre();
}

//======================class===============
class StaticExmaple{
    public static $objCout;
    public function __construct(){
        
          StaticExmaple::$objCout ++;
    }
    public static function display(){
        echo StaticExmaple::$objCout;

    }
}
StaticExmaple::$objCout=0;

$obj1= new StaticExmaple();
$obj2= new StaticExmaple();
$obj3= new StaticExmaple();

StaticExmaple::display();






?>
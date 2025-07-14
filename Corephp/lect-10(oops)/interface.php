<?php
interface CommanMethod{
    public function display();
    public function add($a,$b);
}

class Main implements CommanMethod{
    public function display(){
        echo "display method called";
    }

    public function add($a,$b){
        echo "<br>addition =".$a+$b;
    }


}

$m1 = new Main();
$m1->display();
$m1->add(100,788);

?>
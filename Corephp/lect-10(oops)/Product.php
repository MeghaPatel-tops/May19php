<?php

class Product{
    
    private $pid,$pname,$price;

    public function getdata(){
        $this->pid=1;
        $this->pname="Laptop";
        $this->price=21001;
    }
    public function printData(){
        echo "Pid=".$this->pid."<br>";
        echo "Pname=".$this->pname."<br>";
        echo "Price=".$this->price."<br>";
    }
}
 
$p1 = new Product();
$p1->pid;
$p1->getdata();
$p1->printData();

?>
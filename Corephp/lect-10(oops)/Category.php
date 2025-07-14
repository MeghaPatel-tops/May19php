<?php
class Category{
    protected $cat_id,$cat_name;

    public function getCatdata(){
        $this->cat_id=101;
        $this->cat_name="Electronics";
    }


}

class Product extends Category{
    public $pid,$pname,$price;

    public function getProduct(){
        $this->pid=1001;
        $this->pname="Laptop";
        $this->price=21000;
    }

    public function showProduct(){
        echo "<p>Prodcut Name $this->pname<br> Price=$this->price <br> catid=$this->cat_id<br>catname=$this->cat_name";
    }
}

$p1 = new Product();
$p1->getCatdata();
$p1->getProduct();
$p1->showProduct();



?>
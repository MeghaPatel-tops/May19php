<?php
include('db.php');
if(isset($_GET['pid'])){
    $pid= $_GET['pid'];
    $query = "delete from products where pid = $pid";
    $result = $connection->query($query);

    if($result){
        header("Location:product.php");
    }
    else{
        echo "Something Wrong";
    }

}


?>
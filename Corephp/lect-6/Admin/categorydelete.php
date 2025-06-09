<?php
include('db.php');
   if(isset($_REQUEST['cid'])){
        $cid = $_REQUEST['cid'];
        $query = "select * from category where cid=$cid";
        $req= $connection->query($query);
        $catData = $req->fetch_object();
       
       echo  $filename = "uploads/".$catData->cimage;
        unlink($filename);

        $delQuery = "delete from category where cid=$cid";
        $result = $connection->query($delQuery);
        if($result){
            header("Location:category.php");
        }
        else{
            echo "Something wrong";
        }
   }


?>
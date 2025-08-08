<?php
$con = new mysqli("localhost","root","","may19php");
if(isset($_REQUEST['countryapi'])){
    $query = "select * from countries";
    $req=$con->query($query);
    while($row = $req->fetch_object()){
        $rw[]=$row;
    }
   // echo count($rw);
    $rw = $rw ?? [];
    echo json_encode($rw);
}

if(isset($_REQUEST['state'])){
    $ccode = $_REQUEST['state'];
     $query = "select * from states where cid ='$ccode'";
    $req=$con->query($query);
    while($row = $req->fetch_object()){
        $rw[]=$row;
    }
   // echo count($rw);
    $rw = $rw ?? [];
    echo json_encode($rw);
}


if(isset($_REQUEST['city'])){
    $ccode = $_REQUEST['city'];
     $query = "select * from cities where statecode ='$ccode'";
    $req=$con->query($query);
    while($row = $req->fetch_object()){
        $rw[]=$row;
    }
   // echo count($rw);
    $rw = $rw ?? [];
    echo json_encode($rw);
}

if(isset($_REQUEST['wapp'])){
    $cityid=$_REQUEST['wapp'];
     $query = "select * from cities where cityid ='$cityid'";
     $req=$con->query($query);
    $row = $req->fetch_object();
    $key="04efb7796586439b09f90f8ca239e2de";
    $data = file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat='.$row->lat.'&lon='.$row->lon.'&appid='.$key);
    //echo "<pre>";
    //print_r(json_decode($data));
    $data = json_decode($data);    
    echo json_encode( $data->main );
}

?>
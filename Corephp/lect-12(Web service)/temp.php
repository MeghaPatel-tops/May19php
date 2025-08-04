<?php
$con = new mysqli("localhost","root","","may19php");
if(isset($_REQUEST['country'])){
            $countryStr = file_get_contents('countries.json');

        $countryArray = json_decode($countryStr);

        foreach($countryArray as $key ){
            $countries[]=["cname"=>$key->name,"ccode3"=>$key->iso3,"ccode2"=>$key->iso2];
            $query = 'insert into countries(cname,ccode2,code3)values("'.$key->name.'","'.$key->iso2.'","'.$key->iso3.'")';
            $con->query($query);
        }

}
if(isset($_REQUEST['state'])){
    $state = file_get_contents('states.json');
    $stateArray = json_decode($state);
    foreach($stateArray as $key){
        $query='insert into states (stateid,sname,scode,cid)values("'.$key->id.'","'.$key->name.'","'.$key->iso2.'","'.$key->country_code.'")';
        $con->query($query);
    }
}

if(isset($_REQUEST['city'])){
    $cities = file_get_contents('cities.json');
    $cityArray = json_decode($cities);
    // echo "<pre>";
    // print_r($cityArray);
    foreach($cityArray as $key){
        $query='insert into cities (cityid,cityname,countrycode,statecode,lon,lat)values("'.$key->id.'","'.$key->name.'","'.$key->country_code.'","'.$key->state_code.'","'.$key->latitude.'","'.$key->longitude.'")';
        $con->query($query);
    }
}

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="submit" value="Countries Add" name="country">
        <input type="submit" value="State Add" name="state">
        <input type="submit" value="City Add" name="city">
    </form>
</body>
</html>
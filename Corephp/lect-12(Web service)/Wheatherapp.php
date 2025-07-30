<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
<?php 
    if(isset($_REQUEST['submit'])){
        $key="04efb7796586439b09f90f8ca239e2de";
        $data = file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat=21.1702&lon=72.8311&appid='.$key);
        
        $wArray = json_decode($data);

        echo "<pre>";
        print_r($wArray);
    }

?>
</html>
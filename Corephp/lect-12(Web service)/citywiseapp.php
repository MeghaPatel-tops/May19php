<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <fieldset>
    <legend>weather app</legend>
     <form method="post">
        <label for="">Enter city</label>
        <input type="text" name="city" id="">
        <br><br><br>
        <input type="submit" value="Submit" name="submit">
     </form>
   </fieldset>
   <?php
        if(isset($_REQUEST['submit'])){
            $city = $_REQUEST['city'];
            $key="04efb7796586439b09f90f8ca239e2de";
            $url="http://api.openweathermap.org/geo/1.0/direct?q=$city,'Gujarat','IN'&limit=1&appid=$key";

            $data = file_get_contents($url);
            $array = json_decode($data);
          
            $log=$array[0]->lon;
            $lat=$array[0]->lat;
             $dataW = file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat=21.1702&lon=72.8311&appid='.$key);
        
                $wArray = json_decode($dataW);

                $result = $wArray->main ?? [];

        }

         if(isset($result)){
              foreach($result as $key =>$value){
            echo "<h1>$key=$value</h1>";
        }
         }
   
   ?>
   
</body>
</html>
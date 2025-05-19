<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Enter number1</label>
        <input type="text" name="number1" id="">
        <br>
        <br>
         <label for="">Enter number2</label>
        <input type="text" name="number2" id="">
         <br>
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>

<?php
    if(isset($_REQUEST['submit'])){
        $number1 = (int)$_REQUEST['number1'];//10
        $number2 = (int)$_REQUEST['number2'];
        echo "addition =".$number1 + $number2."<br>";
        echo "sub =".$number1 - $number2."<br>";
        echo "mul =".$number1 * $number2."<br>";
        echo "div =".$number1 / $number2."<br>";
        echo "rem =".$number1 % $number2."<br>"; 
        echo "addition =".$number1 + $number2."<br>";
        echo "increment ++  =".++$number1 ."<br>";
        echo "decrement ++  =".--$number2 ."<br>";

        echo $number1 ."<br>";
        echo "<h1>Assignment operator</h1>";
        $number1+=20;
        echo "number1+=20 ----".$number1  ."<br>";
        $number1-=5;
        echo "number1-=5 ----".$number1  ."<br>";
        $number1*=3;
        echo "number1*=3 ----".$number1  ."<br>";
        $number1/=2;
        echo "number1/=2 ----".$number1  ."<br>";

        echo "<h1>Relation operator</h1>";
        echo "<br>number1 == number2:=";
        echo $number1 == $number2;
        echo "<br>number1 != number2:=";
        echo $number1 != $number2;
    }
?>
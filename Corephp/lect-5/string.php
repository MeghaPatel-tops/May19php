<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $str= "tops";
      echo $str;
      $str1= "hello";
      $str2="wolrd";
      echo "<br>";
      echo $str1.$str2;

      
    ?>
    <h1>addcslashes() Returns a string with backslashes in front of the specified characters
</h1>
<?php
    echo addcslashes("hello wolrd woop",'w');

?>
<h1>join()</h1>
<?php
    $subject = ['php','java'];

    echo join($subject);
    echo "<br>";

    echo trim("                php");

?>
<h1>Md5</h1>
<?php
    $pass= 'admin123';

    echo md5($pass);

    echo "<br>";

   echo  $enPass= base64_encode($pass);

    echo "<br>";
   echo $dePass = base64_decode($enPass);

?>

<h1>Money_formate</h1>
<?php
        echo $price = 345000;
        setlocale(LC_MONETARY, 'en_IN');
        //echo $price = money_format('%!i', $price);

?>
<h1>nl2br</h1>
<?php
    echo nl2br("tops technol\nogy \nsurat")
?>
<h1>Strcmp</h1>
<?php
    $s="one";
    $y="One";

    echo strcmp($s,$y);
 
 echo "<br>";

    echo strcasecmp($s,$y);

?>
</body>
</html>
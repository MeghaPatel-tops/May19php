<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PUSH  Pop</h1>
    <?php
    echo "<pre>";
    $userOne = ['uname'=>'megha','email'=>'m@gmail.com','gender'=>'female'];

      $fruits = ['banana','apple','kiwi'];

      array_push($fruits,"mango");

      print_r($fruits);

      array_pop($fruits);
        print_r($fruits);

     
    ?>
    <h1>Count</h1>
    <?php
       echo count($fruits);
    ?>
    <h1>Sort =>numeric array ASC</h1>
    <?php
           sort($fruits);
        print_r($fruits);
    ?>
     <h1>Rsort =>numeric array DESC</h1>
    <?php
           rsort($fruits);
        print_r($fruits);
    ?>
     <h1>Ksort =>Associative array Keys ASC</h1>
    <?php
          ksort($userOne);
        print_r($userOne);
    ?>
     <h1>Krsort =>Associative array Keys DESC</h1>
    <?php
          krsort($userOne);
        print_r($userOne);
    ?>
     <h1>asort =>Associative array value ASC</h1>
    <?php
          asort($userOne);
        print_r($userOne);
    ?>
     <h1>arsort =>Associative array Values DESC</h1>
    <?php
          arsort($userOne);
        print_r($userOne);
    ?>
</body>
</html>
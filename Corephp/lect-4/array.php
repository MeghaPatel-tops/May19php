<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Numeric Arrays</h1>
    <?php
    $fruits = ["apple","banana","kiwi","mango"];
    echo "<pre>";
    print_r($fruits);
    ?>
    <h1>Associative Arrays</h1>
    <?php
    $product = [
        'pname'=>'Laptop',
        'price'=>100000,
        'brand'=>"DELL"
    ];
    print_r($product);
    ?>
    <h1>Multidimensional Arrays</h1>
    <?php
      $subject = [
          "frontend"=>['html','css','js','reactjs'],
          "backend"=>["php"=>["Laravel","cake php"],"java",".net"]
      ];
      print_r($subject);
    ?>
</body>
</html>
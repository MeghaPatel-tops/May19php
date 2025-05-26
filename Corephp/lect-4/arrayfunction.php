<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Array_chunk</h1>
    <?php
    $latterArray = ['a','b','c','d','e','f'];
    echo "<pre>";
    print_r(array_chunk($latterArray,3));
    ?>

    <h1>array_column</h1>
    <?php
    $users = [
        ['uname'=>'abc','email'=>'abc@gmail.com'],
        ['uname'=>'xtz','email'=>'xyz@gmail.com'],
        ['uname'=>'test','email'=>'test@gmail.com'],
        ['uname'=>'abc','email'=>'abc@gmail.com'],
    ];
    print_r($users);
    print_r(array_column($users,'email'));
    ?>
    <h1>array_keys array_values</h1>
    <?php
    $userOne = ['uname'=>'megha','email'=>'m@gmail.com','gender'=>'female'];
    print_r(array_keys($userOne));
    print_r(array_values($userOne));
    ?>
    <h1>implode=>array to string  explode=>string to array</h1>
    <?php
    $hobby = ['music','sports','dance'];
    echo $hobbyStr= implode("-",$hobby);
    echo "<br>";
    print_r(explode("-",$hobbyStr));

    ?>
</body>
</html>
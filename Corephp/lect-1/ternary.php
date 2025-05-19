<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Enter your Age:</label>
        <input type="text" name="age" id="">
        <input type="submit" value="submit" name="submit">

    </form>
    <?php
        if(isset($_REQUEST['submit'])){
            $age = $_REQUEST['age'];
            $str = ($age >= 18 )?"Elibile for voting":"Not Eligible";
            echo $str;
        }
    ?>

</body>
</html>
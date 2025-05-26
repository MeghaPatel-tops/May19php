<?php
date_default_timezone_set('Asia/Kolkata');
echo date_default_timezone_get();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php echo date("Y:m:d H:i:s a")?>

    </h1>
    <hr>
    <p>The checkdate() function is used to validate a Gregorian date.

</p>
    <?php
    var_dump(checkdate(12,24,-2025));
    
    ?>
    <hr>
    <p>The date_date_set() function sets a new date.

    </p>
    <?php
      $newDate = date_create();
      date_date_set($newDate,1990,01,31);
      echo date_format($newDate,"Y-M-d");
    ?>
    <hr>
    <p>Time()</p>
    <?php
    echo time();
    
    ?>
</body>
</html>
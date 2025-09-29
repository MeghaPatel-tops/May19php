<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  $str = "music-sport";
            $hobbyArray = explode("-",$str);
            //$name="abc";
            ?>
<fieldset>
    <legend>select youe hobby</legend>
    <form method="post">
        <input type="text" name="" id="" value="<?php echo $name??'' ?>">
        <input type="checkbox" name="hb[]" id="" value="music" 
        <?php
           echo  (in_array('music',$hobbyArray)) ?'checked':'';
        ?>>Music
    <input type="checkbox" name="hb[]" id="" value="sport"  <?php
           echo  (in_array('sport',$hobbyArray)) ?'checked':'';
        ?>>Sport
    <input type="checkbox" name="hb[]" id="" value="dance" <?php
           echo  (in_array('dance',$hobbyArray)) ?'checked':'';
        ?>>Dance
    <input type="submit" value="Add" name="submit">
    </form>
    <?php
        if(isset($_REQUEST['submit'])){
            $hobby = $_REQUEST['hb'];
            echo "<pre>";
            print_r($hobby);
            echo "<hr>";
            echo $str = implode("-",$hobby);
            echo '<form method="post"> <input type="submit" value="Edit" name="Edit"></form>';
        }

        if(isset($_REQUEST['Edit'])){
           
            print_r($hobbyArray);
        }

?>
</fieldset>
</body>
</html>


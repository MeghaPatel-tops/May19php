<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <form method="get" >
        <legend>Registration</legend>
        <label for="">Username</label>
        <input type="text" name="uname" id="">
         <br><br>
        <label for="">Email</label>
        <input type="text" name="email" id="">
         <br><br>
         <input type="submit" value="submit" name="submit">
         </form>
    </fieldset>
</body>

</html>
<?php
    if(isset($_GET['submit'])){
        echo $username = $_GET['uname'];
        echo "<br>";
        echo $email = $_GET['email'];
    }
?>
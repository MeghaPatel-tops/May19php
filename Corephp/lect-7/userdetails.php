<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <fieldset>
        <legend>Add User</legend>
       <form method="post">
            <label for="">Enter Name</label>
            <input type="text" name="uname" id="">
            <br><br>
             <label for="">Enter Email</label>
            <input type="text" name="email" id="">
            <br><br>
            <input type="submit" value="Add" name="submit">
       </form>
    </fieldset>
    <table class="table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
            $fp = fopen("user.csv","a+");
            if(isset($_REQUEST['submit'])){
                $name = $_REQUEST['uname'];
                $email=$_REQUEST['email'];
                //fprintf($fp,"Name,Email,\n");
    
            fprintf($fp,$name.",".$email.",\n");
            fclose($fp);
            }
            echo "<tr><td>";
             $fp = fopen("user.csv","r");
            while(!feof($fp)){
                $ch= fgetc($fp);
                if($ch=="\n"){
                    echo "<tr><td>";
                    continue;
                }
                 if($ch === ","){
                   echo  "</td><td>";
                    continue;
                }
                echo $ch;
                
               
            }
          

            //while($)
           
    
    ?>
    </tbody>
        </table>
</body>
</html>
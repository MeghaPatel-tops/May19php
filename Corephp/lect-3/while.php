<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <!-- 
while(condition){
    //block
   } 
    -->

    <ul>
        
    
    <?php
        $i=1;
        echo "<h1>while loop example</h1>";
        while($i<=10){
            echo "<li>item-$i</li>";
            $i++;
        }

    

        // for(init;condition;modifcation){
        //     //block
        // }
        echo "<hr>";
         echo "<h1>for loop example</h1>";
        for($j=1;$j<=10;$j++){
             echo "<li>item-$j</li>";
        }

        // do{
        //     //block
        // }while(condition)
         echo "<hr>";
         echo "<h1>Do-while loop example</h1>";
         $m=20;
         do{
           echo "<li>item-$m</li>";
           $m++;
         }
         while($m<=10);
    ?>
    </ul>
</body>
</html>
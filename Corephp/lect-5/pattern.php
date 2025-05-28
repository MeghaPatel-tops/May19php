<?php
 
   require_once('comman.php');

 
   for($i=1;$i<=5;$i++){
      for($k=4 ;$k>=$i;$k--){
        echo "-";
      }
      for($j=1;$j<=$i;$j++){
         echo $j;
      }
      echo "<br>";
   }

?>

1  - - - - 1 
2  - - - 1 2
3  - - 1 2 3
4  - 1 2 3 4
5  1 2 3 4 5
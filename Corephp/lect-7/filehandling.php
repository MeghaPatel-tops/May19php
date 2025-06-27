<?php
    $fp =fopen("test.txt","w");
    fprintf($fp,"hello Wolrd");//writing data into file
    fclose($fp);

    $fp = fopen("test.txt","r");
    /*
    first parameter :=> file pointer 
    sec parameter :=> no of char to be read from file(int)
    */
    $str = fread($fp,100);//read data from file
    echo $str;
    fclose($fp);


?>
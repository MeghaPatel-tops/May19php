<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     function printHello(){
        echo "Hello wolrd";
     }

     printHello();

     function simpleCal($a,$b){
        echo "<br>addition=".$a+$b;
     }
     simpleCal(12,34);
     //default parameter


      function multi($a,$b,$c=1){
        echo "<br>multiplication=".$a*$b*$c;
     }

     multi(12,3,2);

     //PHP Functions -Return values

     function areaofCircle($r){
        return 3.14*$r*$r;
     }
     echo "<br>area of circle=";
    echo  $area=areaofCircle(2);
     
    //Passing Function parameters by reference
     $a= 10;
     $b= 20;

     function swap(&$a,&$b){
        $temp = $a;
        $a=$b;
        $b=$temp;
        echo "<br>inner a=".$a."b=".$b;
     }

     swap($a,$b);

     echo "<br>a=".$a."b=".$b;
    //Recursive Function

    function findFact($num){
        if($num==1){
            return 1;
        }
        $f = $num *findFact($num-1);//5*ff(4)//5*4*ff(3)//
        return $f;
    }

    echo "<br>".$fact= findFact(5);

echo "<hr>";
    var_dump($a);

    echo "<br>";
    var_export($a);

    ?>
</body>
</html>
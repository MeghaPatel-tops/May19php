<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>
            simple if-else
        </legend>
        <form method="post">
        <label for="">Enter Number</label>
        <input type="text" name="num1" id="">
        <input type="submit" value="Check" name="submit">
    </form>
    <?php
    if(isset($_REQUEST['submit'])){
        $num1 = $_REQUEST['num1'];
        if($num1 > 0 ){
            echo "$num1 is positive";
        }
        else{
            echo "$num1 is negative";
        }
    }
?>
    </fieldset>

       <fieldset>
        <h1>quadrant math find</h1>
        <legend>
            else if ladder
        </legend>
        <form method="post">
        <label for="">Enter X1</label>
        <input type="text" name="x1" id="">
         <label for="">Enter X2</label>
        <input type="text" name="x2" id="">
        <input type="submit" value="Check" name="qsubmit">
    </form>
    <?php
    if(isset($_REQUEST['qsubmit'])){
        $x1= $_REQUEST['x1'];
        $x2=$_REQUEST['x2'];

        if($x1 > 0 && $x2 >0){
            echo "first";
        }
        else if($x1 < 0 && $x2 >0){
            echo "sec";
        }
        else if($x1 < 0 && $x2 <0){
            echo "third";
        }
        else if($x1 > 0 && $x2 <0){
            echo "forth";
        }
        else{
            echo "center";
        }
      
    }
?>
    </fieldset>

    <fieldset>
        <h1>Simple calc using switch </h1>
        <legend>
            else if ladder
        </legend>
        <form method="post">
        <label for="">Enter Number1</label>
        <input type="text" name="n1" id="">
         <label for="">Enter Number2</label>
        <input type="text" name="n2" id="">
          <label for="">Enter operator(+,-,*,/)</label>
        <input type="text" name="op" id="">
        <input type="submit" value="Check" name="calc">
    </form>
    <?php
        if(isset($_REQUEST['calc'])){
            $n1= $_REQUEST['n1'];
            $n2= $_REQUEST['n2'];
            $op= $_REQUEST['op'];

            switch($op){
                case '+':
                    echo "addition = ". $n1+$n2;
                break; 
                 case '-':
                    echo "sub = ".$n1-$n2;
                break; 
                 case '*':
                    echo "mul = ".$n1*$n2;
                break; 
                 case '/':
                    echo "div =". $n1/$n2;
                break;
                default:
                    echo "wrong choice ";
                break;        
            }
        }
    ?>
</fielset>

    
</body>
</html>

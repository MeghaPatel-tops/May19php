<?php
  $str ="tops tech surataaa";
  echo substr($str,-3,4);

  $num1= 14.3;
  echo (int)$num1;

  echo __DIR__;


  $salary =[ 12000,15000,20000,10000];

  function updateSalary($value){
    
      return ($value + ($value*10)/100);
  }

  function sumSalary($v1,$v2){
      return $v1+$v2;
  }
echo "<pre>";
  print_r(array_map("updateSalary",$salary));
  print_r(array_reduce($salary,'sumSalary'));

?>
<?php
$str="aabbccdd";

$str = strtolower($str);


$array1 = str_split($str);

$count1 = array_count_values($array1);
echo "<pre>";
print_r($count1);



?>
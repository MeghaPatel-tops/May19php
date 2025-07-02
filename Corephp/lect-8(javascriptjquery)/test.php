<?php

$data =file_get_contents("data.xml");

$data = json_encode($data);
echo "<pre>";
print_r(json_decode($data))




?>
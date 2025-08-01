<?php
    $post = file_get_contents('https://jsonplaceholder.typicode.com/posts');
     
    $postArray = json_decode($post);

    print_r($post);

?>
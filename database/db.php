<?php

    $conn = mysqli_connect('localhost', 'root', '', 'social-media');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>
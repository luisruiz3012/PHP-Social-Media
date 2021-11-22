<?php

include('../database/db.php');

$id = $_GET['comment'];
$post = $_GET['post'];
$query = "DELETE FROM `comments` WHERE `id_comment` = '$id';";
$result = mysqli_query($conn, $query);

if($result){
    header("Location: ../views/read.php?post=$post");
}

?>
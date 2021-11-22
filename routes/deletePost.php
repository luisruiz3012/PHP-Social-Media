<?php
session_start();
include('../database/db.php');
$id = $_GET['id'];

$query = "SELECT * FROM `posts` WHERE `id_post` = '$id'";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_array($result);

if($_SESSION['id'] == $post['user_id']) {
    $sql = "DELETE FROM `posts` WHERE `posts`.`id_post` = '$id'";
    $result2 = mysqli_query($conn, $sql);
    header('Location: ../index.php');
} else {
    header('Location: ../index.php');
}


?>
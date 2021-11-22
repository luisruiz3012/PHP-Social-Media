<?php
session_start();
include('../database/db.php');

if($_SESSION['id'] == $_GET['id']){
    $id = $_SESSION['id'];
    $sql = "DELETE FROM users WHERE id_user= '$id'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        session_destroy();
        header('Location: ../index.php');
    }
}

?>
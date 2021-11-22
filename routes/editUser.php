<?php
session_start();
include('../database/db.php');

$user = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if($password != '') {
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $image = $_POST['image'];

    $id = $_SESSION['id'];

    $sql = "UPDATE users SET name='$user', email='$email', password='$password', image='$image' WHERE id_user='$id'";
    $result = mysqli_query($conn, $sql);

    $sql_posts = "UPDATE posts SET author='$user' WHERE user_id='$id';";
    $result_posts = mysqli_query($conn, $sql_posts);

    $sql_comments = "UPDATE comments SET name='$user', user_image='$image' WHERE user_id='$id';";
    $result_comments = mysqli_query($conn, $sql_comments);

    $_SESSION['name'] = $user;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['image'] = $image;

    header('Location: ../views/profile.php');
} else {
    $image = $_POST['image'];

    $id = $_SESSION['id'];

    $sql = "UPDATE users SET name='$user', email='$email', image='$image' WHERE id_user='$id'";
    $result = mysqli_query($conn, $sql);

    $sql_posts = "UPDATE posts SET author='$user', user_image='$image' WHERE user_id='$id';";
    $result_posts = mysqli_query($conn, $sql_posts);

    $sql_comments = "UPDATE comments SET name='$user', user_image='$image' WHERE user_id='$id';";
    $result_comments = mysqli_query($conn, $sql_comments);

    $_SESSION['name'] = $user;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['image'] = $image;

    header('Location: ../views/profile.php');
}

?>
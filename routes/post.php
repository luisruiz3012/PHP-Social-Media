<?php
    session_start();
    include('../database/db.php');

    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['name'];
    $date = date("Y-m-d H:i");
    $user_id = $_SESSION['id'];
    $image = $_SESSION['image'];

    $sql = "INSERT INTO posts(id_post, title, description, author, created_at, user_id, user_image) VALUES (NULL, '$title', '$content', '$author', '$date', '$user_id', '$image');";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location: ../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>
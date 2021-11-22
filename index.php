<?php
    session_start();
    include('./database/db.php');
    include('./includes/header.php');

    if(isset($_SESSION['id'])){
        include('./views/feed.php');
    } else {
        header('Location: login.php');
    }

    include('./includes/footer.php')
?>  
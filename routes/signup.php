<?php
include('../database/db.php');

session_start();

if($_POST['submit']) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $image;

    if($image == '') {
        $image = 'https://i.stack.imgur.com/l60Hf.png';

        if($password == $cpassword) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $confirmation_query = "SELECT * FROM `users` WHERE email= '$email'";
            $confirmation = mysqli_query($conn, $confirmation_query);
    
        // echo json_encode(mysqli_fetch_array($confirmation));
    
            if($email != mysqli_fetch_array($confirmation)['email']){
                $query = "INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `image`) VALUES (NULL, '$name', '$email', '$password', '$image');";
                $result = mysqli_query($conn, $query);
    
                if($result){
                    echo 'User added successfully';
                }else {
                    echo 'Error: ' . mysqli_error($conn);
                }
            } else {
                // header('Location: signup.php');
                echo 'Email already in use';
            }
        } else {
            $image = $_POST['image'];
            if($password == $cpassword) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $confirmation_query = "SELECT * FROM `users` WHERE email= '$email'";
                $confirmation = mysqli_query($conn, $confirmation_query);
        
            // echo json_encode(mysqli_fetch_array($confirmation));
        
                if($email != mysqli_fetch_array($confirmation)['email']){
                    $query = "INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `image`) VALUES (NULL, '$name', '$email', '$password', '$image');";
                    $result = mysqli_query($conn, $query);
        
                    if($result){
                        echo 'User added successfully';
                    }else {
                        echo 'Error: ' . mysqli_error($conn);
                    }
                } else {
                    // header('Location: signup.php');
                    echo 'Email already in use';
                }
            }
        }
    }
}

if(isset($_SESSION['id'])){
    header('Location: ../index.php');
}

?>


<?php include('../includes/header.php'); ?>
<main class="container text-center">
    <div class="container text-center mt-5">
        <h1>Signup</h1>
        <form class="form-container" method="post" action="signup.php">
            <div class="form-group mt-4">
                <input type="text" name="image" placeholder="Url for your profile picture" />
            </div>
            <div class="form-group mt-4">
                <input type="text" name="name" placeholder="Enter a name" />
            </div>
            <div class="form-group mt-4">
                <input type="email" name="email" placeholder="Enter a email address" />
            </div>
            <div class="form-group mt-4">
                <input type="password" name="password" placeholder="Enter a password" />
            </div>
            <div class="form-group mt-4">
                <input type="password" name="cpassword" placeholder="Confirm your password" />
            </div>
            <div class="form-group mt-4">
                <input class="btn btn-primary" type="submit" name="submit" value="Signup" />
            </div>
        </form>
        <p class="form-group mt-4">Already have an account? <a href="../login.php">Login</a></p>
    </div>
</main>

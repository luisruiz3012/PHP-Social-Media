<?php 

include('./database/db.php');

    session_start();

    if($_POST['login']) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM `users` WHERE email= '$email'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_array($result);

        if (!$user) {
            echo 'Error: ' . mysqli_error($conn);
        }


        if(password_verify($password, $user['password'])){
            $_SESSION['id'] = $user['id_user'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['image'] = $user['image'];
            header('Location: index.php');
        } else {
            header('Location: login.php');
        }
    }

    if(isset($_SESSION['id'])){
        header('Location: index.php');
    }

?>

<?php include('./includes/header.php'); ?>
    <div class="container text-center mt-5">
    <h1>Login</h1>
    <form class="container" method="post" action="login.php">
        <div class="form-group mt-4">
            <input type="email" name="email" />
        </div>
        <div class="form-group mt-4">
            <input type="password" name="password" />
        </div>
        <input class="btn btn-primary mt-4 mb-3" type="submit" name="login" value="Submit" />
    </form>
    <p>Don't have an account? <a href="./routes/signup.php">Signup</a></p>
    </div>
</body>
</html>
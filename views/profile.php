<?php

session_start();
include('../includes/header.php');
include('../database/db.php');

$query = "SELECT * FROM users WHERE id_user = '".$_SESSION['id']."'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);


?>

<main class="container p-4">
    <section class="container p-4">
        <h1><?php echo $_SESSION['name']; ?></h1>

        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <img class="img-responsive mt-3" style="max-width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" src="<?php echo $_SESSION['image'];?>">

            <form action="<?php echo '../routes/deleteAccount.php?id='.$_SESSION['id'];?>" method="post">
                <input type="submit" style="height: 38px; width: 150px;" class="btn btn-danger mt-5" value="Delete account">
            </form>
        </div>
    </section>
    <section class="container p-4">
        <form action="<?php echo "../routes/editUser.php"?>" method="post">
        <div class="form-group">
                <label for="image">Image Url</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo $row['image']; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter a new password">
            </div>
            <div class="form-group mt-3">
                <input class="btn btn-primary" type="submit" name="updateInfo" value="Update">
            </div>
        </form>
    </section>
    <section class="mt-4 container">
        <h2>Posts</h2>
        <?php
            $query = "SELECT * FROM posts WHERE user_id = '".$_SESSION['id']."'";
            $result = mysqli_query($conn, $query);
        ?>

                <?php if(mysqli_num_rows($result)) { ?>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <div class="card card-body mb-3">
                            <h4><?php echo $row['title']; ?></h4>
                            <p><?php echo substr($row['description'], 0, 350);?>
                            <?php if(strlen($row['description']) >= 350) { ?>
                                <?php echo '...' ?>
                        <?php } ?>
                        </p>
                            <div class="d-flex">
                                <a class="btn btn-danger me-2" href="../routes/deletePost.php?id=<?php echo $row['id_post']; ?>">Delete</a>
                                <a class="btn btn-dark me-2" href="../routes/editPost.php?id=<?php echo $row['id_post']; ?>">Update</a>
                            </div>
                        </div>
                    <?php } ?>
            <?php } else {
                echo '<div class="card card-body mb-3">';
                echo '<h4>No posts</h4>';
                echo '</div>';
            } ?>
    </section>
</main>
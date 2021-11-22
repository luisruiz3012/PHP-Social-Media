<?php
include('../database/db.php');
include('../models/post.php');
$user = $_GET['user'];

$sql = "SELECT * FROM users WHERE id_user='$user'";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($result);


$sql2 = "SELECT * FROM posts WHERE user_id = '$user' ORDER BY id_post DESC;";
$result2 = mysqli_query($conn, $sql2);

?>

<?php include('../includes/header.php'); ?>

<?php if($user != $_SESSION['id']) { ?>
    <main class="container p-4">
        <section class="container p-4">
            <h1><?php echo $info['name']; ?></h1>

            <img class="img-responsive mt-3" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" src="<?php echo $info['image'];?>">
        </section>
        <section class="container p-4">
            <form action="<?php echo "../routes/editUser.php"?>" method="post">
                <div class="form-group mt-3">
                    <h5 for="name">Name</h5>
                    <p><?php echo $info['name']; ?></p>
                </div>
                <div class="form-group mt-4">
                    <h5 for="email">Email</h5>
                    <p><?php echo $info['email']; ?></p>
                </div>
            </form>
        </section>
        <section class="mt-4">
            <h2>Posts</h2>
            <?php while ($info2 = mysqli_fetch_array($result2)) { ?>
                <?php $post = new Post($info2['id_post'], $info2['title'],  $info2['author'], $info2['description'], $info2['created_at'], $info2['user_id']); ?>
                <article class="mt-4">
                    <div class="card container mb-2">
                        <div class="card-body">
                            <div class="d-flex align-items-center mt-3 mb-3">
                                <img class="img-responsive me-2" style="width: 25px; height: 25px; border-radius: 50%; object-fit: cover;" src="<?php echo $info2['user_image'] ?>" />
                                <span class="card-text"><b><i><?php echo ' '.$post->author; ?></i></b></span>
                            </div>
                            <h3 class="card-title mt-4"><?php echo $post->title; ?></h3>
                            <p class="card-text mt-4"><?php echo substr($post->content, 0, 350); ?> 
                            <?php
                                if(strlen($post->content) >= 350) {
                                    echo "...";
                                };
                            ?>
                            </p>
                            <span class="card-text"><?php echo $post->date; ?></span>
                            <a href="<?php echo './read.php?post='.$post->id; ?>" class="btn btn-primary float-end m-3">Read More</a>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </section>
    </main>
<?php } else { ?>
    <?php header('Location: ./profile.php'); ?>
 <?php } ?>
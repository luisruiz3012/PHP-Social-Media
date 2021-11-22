<?php
    session_start();
    include('../database/db.php');
    include('../includes/header.php');
    include('../models/comment.php');
    

    $id = $_GET['post'];
    $sql = "SELECT * FROM posts WHERE id_post = $id";
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($result);

    if($_POST['post']) {
        $id = $_GET['post'];
        $name = $_SESSION['name'];
        $comment = $_POST['comment'];
        $user_id = $_SESSION['id'];
        $image = $_SESSION['image'];

        $query = "INSERT INTO `comments` (`id_comment`, `name`, `description`, `post_id`, `user_id`, `user_image`) VALUES (NULL, '$name', '$comment', '$id', '$user_id', '$image');";
        $result2 = mysqli_query($conn, $query);

        if(!$result2){
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        header("Location: ./read.php?post=". $id);
    }

    $query = "SELECT * FROM `comments` WHERE `post_id`='$id' ORDER BY id_comment DESC;";
    $result3 = mysqli_query($conn, $query);
    
?>

<main class="container p-5">
    <article>
        <h1 class="mb-3"><?php echo $post['title']; ?></h1>
        <hr />
        <span><span class="h6">Author: </span> <?php echo $post['author']; ?></span><br />
        <span><span class="h6">Date: </span> <?php echo $post['created_at']; ?></span>
        <br>
        <p class="h6 mt-4">Post:</p>
        <p class="mt-2"><?php echo $post['description']; ?></p>
    </article>

    <section>
        <h3 class="mb-3 mt-5">Comments</h3>
        <section class="mb-3">
            <form action="<?php echo './read.php?post='.$id; ?>" method="post">
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control mt-2" id="comment" name="comment" placeholder="Enter a comment" rows="2"></textarea>
                </div>
                <input type="submit" name="post" class="btn btn-primary mt-3 mb-4" value="submit" />
            </form>
        </section>
        <section class="mt-4">
        <?php while ($info = mysqli_fetch_array($result3)) { ?>
                <?php $comment = new Comment($info['user_id'], $info['name'], $info['description'], $info['user_image']); ?>
                <article class="mt-4">
                    <div class="card container mb-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" src="<?php echo $comment->image ?>" alt="<?php echo $info['name'] ?>">
                                    <h6 class="card-title ms-2 mt-2"><a class="text-dark text-decoration-none" href="<?php echo 'usersProfile.php?user='.$info['user_id'] ?>"><?php echo $comment->author; ?></a></h6>
                                </div>
                                <?php if($_SESSION['id'] == $comment->id ) { ?>
                                    <div>
                                    <a href="<?php echo '../routes/editComment.php?comment='.$info['id_comment'].'&post='.$id; ?>" class="btn btn-dark">Edit</a>
                                    <a href="<?php echo '../routes/deleteComment.php?comment='.$info['id_comment'].'&post='.$id; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                <?php } ?>
                            </div>
                            <hr>
                            <p class="card-text"><?php echo $comment->comment; ?></p>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </section>
    </section>
</main>
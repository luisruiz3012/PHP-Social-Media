<?php
    session_start();
    include('../database/db.php');
    include('/views/feed.php');
    include('./models/post.php');

    $posts_query = "SELECT * FROM `posts` ORDER BY id_post DESC;";
    $posts_result = mysqli_query($conn, $posts_query);

?>


<main class="p-4">
    <section class="mb-5 mt-3 d-flex align-items-center justify-content-center">
        <a class="btn btn-primary"type="button" href="views/create.php">Create Post</a>
    </section>
    <?php while ($info = mysqli_fetch_array($posts_result)) { ?>
        <?php $post = new Post($info['id_post'], $info['title'],  $info['author'], $info['description'], $info['created_at'], $info['user_id']); ?>
        <article class="mt-4">
            <div class="card container mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-3 mb-3">
                        <img class="img-responsive me-2" style="width: 25px; height: 25px; border-radius: 50%; object-fit: cover;" src="<?php echo $info['user_image'] ?>" />
                        <span class="card-text"><b><a class="text-dark text-decoration-none" href="<?php echo './views/usersProfile.php?user='.$info['user_id'] ?>"><?php echo ' '.$post->author; ?></a></b></span>
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
                </div>
                <div class="d-flex align-items-center justify-content-end mb-4">
                    <a class="me-3" href="<?php echo '/social-media/views/read.php?post='.$info['id_post'] ?>">Read more</a>
                </div>
            </div>
        </article>
    <?php } ?>
</main>

<?php include('/views/footer.php'); ?>
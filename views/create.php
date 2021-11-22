<?php
    session_start();
    include('../includes/header.php');
?>

<main class="d-flex p-4 justify-content-center align-items-center flex-column">
    <h1 class="mb-4">Create a new post</h1>
    <form action="../routes/post.php" class="form-horizontal" style="width: 65%;" method="post">
        <div class="form-group d-flex flex-column">
            <label for="title">Title</label>
            <input class="p-2" type="text" name="title" id="title">
        </div>
        <div class="form-group mt-3 d-flex flex-column">
            <label for="content">Content</label>
            <textarea class="p-2" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <input class="btn btn-primary mt-4" type="submit" value="Create">
    </form>
</main>
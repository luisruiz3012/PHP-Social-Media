<?php
include('../database/db.php');

$id = $_GET['id'];

include('../includes/header.php');

$query = "SELECT * FROM `posts` WHERE id_post= $id;";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if(isset($_POST['update'])){
    $comment = $_POST['comment'];
    $title = $_POST['title'];
    $query2 = "UPDATE `posts` SET title='$title', description='$comment' WHERE id_post= $id";
    $result2 = mysqli_query($conn, $query2);
    header("Location: ./editPost.php?id=$id");
}

?>

<main>
    <section class="d-flex p-4 justify-content-center align-items-center flex-column">
        <h1 class="mb-4">Update comment</h1>
        <form action="<?php './editComment.php'; ?>" class="form-horizontal" style="width: 65%;" method="post">
            <div class="form-group">
                <label for="">Title:</label>
                <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group mt-3 d-flex flex-column">
                <label for="comment">Comment:</label>
                <textarea class="p-2 mt-3" name="comment" id="comment" cols="30" rows="10">
<?php echo $row['description']; ?></textarea>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <input class="btn btn-primary mt-4" name="update" type="submit" value="Update">
                <a class="btn w-20 btn-dark mt-4 ms-2" href="<?php echo "../views/profile.php"?>" type="button">Go back</a>
            </div>
        </form>
    </section>
</main>
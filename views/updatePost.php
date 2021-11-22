<?php

include('../database/db.php');

$id = $_GET['comment'];
$post = $_GET['post'];
$submit = $_POST['update'];

include('../includes/header.php');

$query = "SELECT * FROM `comments` WHERE id_comment= $id;";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if(isset($_POST['update'])){
    $comment = $_POST['comment'];
    $query2 = "UPDATE `comments` SET description='$comment' WHERE id_comment= $id";
    $result2 = mysqli_query($conn, $query2);
    header("Location: ../views/read.php?post=$post");
}

?>

<main class="d-flex p-4 justify-content-center align-items-center flex-column">
    <h1 class="mb-4">Update comment</h1>
    <form action="editComment.php" class="form-horizontal" style="width: 65%;" method="post">
        <div class="form-group mt-3 d-flex flex-column">
            <label for="comment">Comment:</label>
            <textarea class="p-2 mt-3" name="comment" id="comment" cols="30" rows="10">
<?php echo $row['description']; ?></textarea>
        </div>
        <input class="btn btn-primary mt-4" name="update" type="submit" value="Update">
    </form>
</main>
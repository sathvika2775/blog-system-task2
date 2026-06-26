<?php
include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn,
    "UPDATE posts
    SET title='$title',
    content='$content'
    WHERE id=$id");

    header("Location: view_post.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

    <div class="logo">
        MyBlog
    </div>

</div>

<div class="container">

    <div class="card-box">

        <h2>Edit Blog Post</h2>

        <form method="POST">

            <label class="form-label">
                Title
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="<?php echo $row['title']; ?>"
                required>

            <br>

            <label class="form-label">
                Content
            </label>

            <textarea
                name="content"
                rows="8"
                class="form-control"
                required><?php echo $row['content']; ?></textarea>

            <br>

            <button
                type="submit"
                name="update"
                class="btn">

                Update Post

            </button>

            <a
                href="view_post.php"
                class="btn"
                style="background:#64748b; margin-left:10px;">

                Cancel

            </a>

        </form>

    </div>

</div>

</body>
</html>
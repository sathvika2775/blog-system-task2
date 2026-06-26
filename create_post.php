<?php
session_start();
include("db.php");

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['create'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title, content)
            VALUES('$title','$content')";

    mysqli_query($conn, $sql);

    header("Location: view_post.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="navbar">
    <div class="logo">MyBlog</div>

    <a href="dashboard.php" class="logout-btn">
        Dashboard
    </a>
</div>

<div class="card-box">

    <h2>Create New Post</h2>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Title</label>

            <input
                type="text"
                name="title"
                class="form-control"
                placeholder="Enter title"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>

            <textarea
                name="content"
                class="form-control"
                rows="8"
                placeholder="Write your content..."
                required></textarea>
        </div>

        <button
            type="submit"
            name="create"
            class="btn btn-primary">
            Create Post
        </button>

        <a
            href="dashboard.php"
            class="btn btn-secondary">
            Back to Dashboard
        </a>

    </form>

</div>

</body>
</html>
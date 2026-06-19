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
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>

<h2>Create New Post</h2>

<form method="POST">

    <label>Title</label><br>
    <input type="text" name="title" required><br><br>

    <label>Content</label><br>
    <textarea name="content" rows="5" cols="40" required></textarea><br><br>

    <button type="submit" name="create">
        Create Post
    </button>

</form>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
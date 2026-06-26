<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="navbar">

    <div class="logo">
        MyBlog
    </div>

    <div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

</div>

<div class="container">

    <h1 style="text-align:center;">
        Welcome Back,
    <?php echo $_SESSION['username']; ?> 👋
    </h1>

    <p style="text-align:center;margin-top:10px;">
        Manage your blog posts easily
    </p>

    <div class="dashboard-cards">

        <div class="dashboard-card">
            <h3>Create Post</h3>
            <p>Add a new blog post</p>
            <br>
            <a href="create_post.php" class="btn">Create</a>
        </div>

        <div class="dashboard-card">
            <h3>View Posts</h3>
            <p>Manage all posts</p>
            <br>
            <a href="view_post.php" class="btn">View</a>
        </div>

    </div>
</div>
</body>
</html>
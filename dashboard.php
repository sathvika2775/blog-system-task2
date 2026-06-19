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
</head>
<body>

<h1>Welcome, <?php echo $_SESSION['username']; ?> 🎉</h1>

<hr>

<a href="create_post.php">Create Post</a> |
<a href="view_post.php">View Posts</a> |
<a href="logout.php">Logout</a>

</body>
</html>
<?php
include("db.php");

$result = mysqli_query($conn, "SELECT * FROM posts");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Posts</title>
</head>
<body>

<h2>All Blog Posts</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Content</th>
    <th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['title']; ?></td>

    <td><?php echo $row['content']; ?></td>

    <td>
        <a href="edit_post.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete_post.php?id=<?php echo $row['id']; ?>">
            Delete
        </a>
    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
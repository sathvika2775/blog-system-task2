<?php
include("db.php");

$limit = 5;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$search = "";

if(isset($_GET['search']) && !empty($_GET['search'])){

    $search = $_GET['search'];

    $query = "SELECT * FROM posts
              WHERE title LIKE '%$search%'
              OR content LIKE '%$search%'
              ORDER BY id DESC
              LIMIT $limit OFFSET $offset";

    $countQuery = "SELECT COUNT(*) AS total
                   FROM posts
                   WHERE title LIKE '%$search%'
                   OR content LIKE '%$search%'";
}
else{

    $query = "SELECT * FROM posts
              ORDER BY id DESC
              LIMIT $limit OFFSET $offset";

    $countQuery = "SELECT COUNT(*) AS total
                   FROM posts";
}

$result = mysqli_query($conn,$query);

$countResult = mysqli_query($conn,$countQuery);

$totalRows = mysqli_fetch_assoc($countResult)['total'];

$totalPages = ceil($totalRows/$limit);

?>

<!DOCTYPE html>
<html>

<head>

<title>View Posts</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-4">

<h2 class="page-title">
    All Blog Posts
</h2>

<form method="GET" class="search-form">

    <div class="search-box">

        <i class="bi bi-search search-icon"></i>

        <input
            type="text"
            name="search"
            placeholder="Search posts..."
            value="<?php echo $search; ?>">

    </div>

</form>

<table class="table table-striped table-bordered align-middle">

<thead>

<tr>

<th>ID</th>

<th>Title</th>

<th>Content</th>

<th width="220">Actions</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['content']; ?></td>

<td class="action-buttons">

<a href="edit_post.php?id=<?php echo $row['id']; ?>" class="edit-btn">
Edit
</a>

<a href="delete_post.php?id=<?php echo $row['id']; ?>" class="delete-btn">
Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<div class="pagination">

<?php

if($page>1){

echo "<a href='?page=".($page-1)."&search=$search'>Previous</a>";

}

echo "<a href='#'>$page</a>";

if($page<$totalPages){

echo "<a href='?page=".($page+1)."&search=$search'>Next</a>";

}

?>

</div>

<div class="text-center mt-4 mb-5">

<a
href="dashboard.php"
class="back-btn">

Back to Dashboard

</a>

</div>

</div>

</body>

</html>
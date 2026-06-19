<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql =
    "SELECT * FROM users WHERE email='$email'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(
            password_verify(
                $password,
                $user['password']
            )
        ){

            $_SESSION['user_id']
            = $user['id'];

            $_SESSION['username']
            = $user['username'];

            header("Location: dashboard.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>User Login</h2>

<form method="POST">

    <input
        type="email"
        name="email"
        placeholder="Email"
        required>

    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Password"
        required>

    <br><br>

    <button name="login">
        Login
    </button>

</form>

<a href="register.php">
    Register
</a>

</body>
</html>
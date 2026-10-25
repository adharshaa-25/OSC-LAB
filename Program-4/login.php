<?php
session_start();
include "db.php";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "<h3>Invalid Username or Password</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Form</h2>

<form method="POST">

    Username:
    <input type="text" name="username" required>

    <br><br>

    Password:
    <input type="password" name="password" required>

    <br><br>

    <input type="submit" name="submit" value="Login">

</form>

</body>
</html>
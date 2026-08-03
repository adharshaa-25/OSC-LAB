<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
</head>
<body>

<form method="post">
    Name:
    <input type="text" name="name" required><br><br>

    Email:
    <input type="email" name="email" required><br><br>

    Feedback:
    <textarea name="message" required></textarea><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback(name,email,message)
            VALUES('$name','$email','$message')";

    if(mysqli_query($conn,$sql)){
        echo ('<script>alert("Feedback Submitted Successfully")</script>');
    } else {
        echo mysqli_error($conn);
    }
}
?>

</body>
</html>
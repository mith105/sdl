<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `registeration` WHERE username = '$username'";
      
    $result=mysqli_query($con,$sql);

    if($result)
    {
        $num=mysqli_num_rows($result);

        if($num>0)
        {
            echo "user already exists";
        }
        else
        {
$sql = "INSERT INTO `registeration` (username, password) VALUES ('$username', '$password')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "sign up successfully";
        header('location:home.php');

    } else {
        die(mysqli_error($con));
    }
        }
    }

   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

    <h1>Registration Form</h1>

    <form action="sign.php" method="post">
        Username: <input type="text" name="username">
        Password: <input type="password" name="password">
        <button type="submit">Register</button>
    </form>
    
</body>
</html>

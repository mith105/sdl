<?php
  $db_name = 'mysql:host=localhost;dbname=form_database';
   $user_name = 'root';
   $user_password = '';

   $conn = new PDO($db_name, $user_name, $user_password);

   session_start();
if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
 
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
 
    if($select_user->rowCount() > 0){
       $_SESSION['email'] = $row['email'];
       header('location:home.php');
    }else{
       $message[] = 'incorrect username or password!';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Add more specific styling or customization as needed */
</style>

</head>
<body>
    <h2>Login</h2>
    <form action="" method="POST">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="login" name="submit">
        <br>
        <p>Already new user ? <a href="register.php">Register now..</a></p>
    </form>
</body>
</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `registeration` WHERE username = '$username' and password='$password'";
      
    $result=mysqli_query($con,$sql);

    if($result)
    {
        $num=mysqli_num_rows($result);

        if($num>0)
        {

            if(isset($_POST["remember"]))   
            //when checkbox is checked
   {  
    setcookie ("member_login",$username,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["admin_name"] = $name;
   }  
   else  
   {  
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["member_password"]))   
    {  
     setcookie ("member_password","");  
    }  
   }  


            session_start();
            $_SESSION['username']=$username;
            echo "Login successfull";

            header('location:home.php');
        }
        else
        {
            echo "invalid credentials";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

    <h1>Login Form</h1>

    <form action="login.php" method="post">
        Username: <input type="text" name="username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
        Password: <input type="password" name="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
        Remember me : <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />  

        <button type="submit">Register</button>
    </form>
    
</body>
</html>
